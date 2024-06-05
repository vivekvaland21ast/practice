<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AddRandomDummyRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Form::create([
            'email' => $faker->unique()->safeEmail,
            'first_name' => $faker->name,
            'last_name' => $faker->name,
            // 'status' => 1,
        ]);
    }
}
