<?php

use Illuminate\Database\Seeder;

class RunnerFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RunnerForm::class,8)->create();
    }
}
