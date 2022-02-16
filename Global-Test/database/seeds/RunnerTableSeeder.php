<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class RunnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     $race_name = App\Race::get('id'); // get the all races id in races table

    $runners = array("Seneka (a2/61.5kg)", "Red Devil (a3/65.5kg)", "Minx (a4/70.0kg)",
    "Sheza (a5/75.5kg)","Thuderstorm (a6/78.0kg)","Kalli (a7/82.5kg)","Campino (a8/85.0kg)",
    "Skydance (a9/90.0kg)");

    $x = 0;
        foreach($race_name as $names){
            DB::table('runners')->insert([
                'name' => $runners[$x],
                'race_id' => $names->id,
                'external_id' => Str::random(10).'-Runner'
            ]);
            $x += 1;
        }

    }
}
