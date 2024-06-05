<?php

namespace App\Console\Commands;

use App\Imports\FileImport;
use App\Models\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Reader;
use League\Csv\Statement;

class ImportCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv';
    protected $description = 'Import CSV data in chunks';
    protected $chunkSize = 100000;
    /**
     * The console command description.
     *
     * @var string
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = storage_path('app/csvFiles/import.csv');

        if (Storage::exists('csvFiles/import.csv')) {
            $offset = $this->getOffset();
            $data = $this->readCSVChunk($filePath, $offset, $this->chunkSize);

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

            $this->updateOffset($this->chunkSize);

            if (count($data) < $this->chunkSize) {
                Storage::delete('csvFiles/import.csv');
                $this->info('All records imported and file deleted.');
            } else {
                $this->info('Imported ' . count($data) . ' records.');
            }
        } else {
            $this->error('CSV file not found.');
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
            $header = fgetcsv($handle, 1000, ','); // Assuming first row is the header
            for ($i = 0; $i < $offset; $i++) {
                fgetcsv($handle); // Skip rows until the offset
            }

            for ($i = 0; $i < $chunkSize; $i++) {
                $row = fgetcsv($handle, 1000, ',');
                if ($row === FALSE) {
                    break; // Break if end of file is reached
                }
                $data[] = array_combine($header, $row);
            }

            fclose($handle);
        }
        return $data;
    }
}
