<?php

namespace App\Jobs;

use App\Models\File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProcessCSVChunk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $chunkSize = 50000;
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $filePath = storage_path('app/csvFiles/import.csv');

        if (Storage::exists('csvFiles/import.csv')) {
            $offset = $this->getOffset();
            $data = $this->readCSVChunk($filePath, $offset, $this->chunkSize);

            DB::beginTransaction(); 

            try {
                foreach ($data as $row) {
                    File::create([
                        'customer_id' => $row['Customer Id'],
                        'first_name' => $row['First Name'],
                        'last_name' => $row['Last Name'],
                        'company' => $row['Company'],
                        'city' => $row['City'],
                        'country' => $row['Country'],
                        'phone1' => $row['Phone 1'],
                        'phone2' => $row['Phone 2'],
                        'email' => $row['Email'],
                        'subscription_data' => $row['Subscription Date'],
                        'website' => $row['Website'],
                    ]);
                }

                $this->updateOffset(count($data));

                if (count($data) < $this->chunkSize) {
                    Storage::delete('csvFiles/import.csv');
                    Storage::delete('csvFiles/offset.txt');
                } else {
                    ProcessCSVChunk::dispatch()->delay(now()->addSeconds(3));
                }

                DB::commit(); 
            } catch (\Exception $e) {
                DB::rollBack(); 
                Storage::delete('csvFiles/import.csv');
                Storage::delete('csvFiles/offset.txt');
                throw $e;
            }
        }
    }

    protected function getOffset()
    {
        return Storage::exists('csvFiles/offset.txt') ? (int) Storage::get('csvFiles/offset.txt') : 0;
    }

    protected function updateOffset($count)
    {
        $newOffset = $this->getOffset() + $count;
        Storage::put('csvFiles/offset.txt', $newOffset);
    }

    protected function readCSVChunk($filePath, $offset, $chunkSize)
    {
        $data = [];
        if (($handle = fopen($filePath, 'r')) !== FALSE) {
            $header = fgetcsv($handle, 50000, ','); 
            for ($i = 0; $i < $offset; $i++) {
                fgetcsv($handle);
            }

            for ($i = 0; $i < $chunkSize; $i++) {
                $row = fgetcsv($handle, 50000, ',');
                if ($row === FALSE) {
                    break;
                }
                $data[] = array_combine($header, $row);
            }

            fclose($handle);
        }
        return $data;
    }
}
