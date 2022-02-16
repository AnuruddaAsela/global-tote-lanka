<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             MeetingTableSeeder::class,
             RaceTableSeeder::class,
             RunnerTableSeeder::class,
             RunnerFormSeeder::class



        ]);
    }
}
