<?php

use App\Meeting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class RaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Meeting = Meeting::first();

        $cars = array("Race 01", "Race 02", "Race 03","Race 04","Race 05",
        "Race 06","Race 07","Race 08");

        for($i=0;$i < count($cars);$i++){
            DB::table('races')->insert([
                'name' => $cars[$i],
                'meeting_id' => $Meeting->id,
                'external_id' => Str::random(10).'-Race'
            ]);

        }

    }
}
