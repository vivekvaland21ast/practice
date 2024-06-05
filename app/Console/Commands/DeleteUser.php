<?php

namespace App\Console\Commands;

use App\Models\Form;
use Artisan;
use Illuminate\Console\Command;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // dd(1234);
        // $user = Form::where('status', 1)->get();
        // foreach ($user as $users) {
        //     $users->delete();
        // }

        // $this->info('Delete status 0 user');

        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\AddRandomDummyRecordSeeder',
        ]);

        $this->info('Dispatched a job to add a random dummy record');
    }
}
