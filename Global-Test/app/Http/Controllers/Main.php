<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Race;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Main extends Controller
{
    public function index(){

        $meeting = Meeting::get();
        $races = Race::get();

        return view("home",
        [
        "meeting"=>$meeting,
        "races"=>$races
    ]);

    }

    public function getAllData(){


    // var_dump(response()->json("hi"));
   $sql = DB::select("SELECT m.id AS `mId`, m.name AS `mName`,  r.id AS `raceId`, r.name AS `rName`,
   run.id AS `runId`, run.name AS `runName`,run_form.id AS `run_formId`, run_form.age AS `run_formAge`,
   run_form.color AS `run_formColor`, run_form.sex AS `run_formSex`, run_form.owner AS `run_formOwner`,
   run_form.career AS `run_formCareer`, run_form.first AS `run_formFirst`, run_form.second AS `run_formSecond`,
   run_form.third AS `run_formThird`, run_form.created_at AS `run_formCreatedDate`
   FROM meetings AS m INNER JOIN races AS r ON r.meeting_id = m.id
   INNER JOIN runners AS run ON run.race_id = r.id
   INNER JOIN `runner_forms` AS run_form ON run_form.runner_id = run.id ORDER BY `raceId` ASC;");

        //var_dump($sql);

    $result =  json_encode($sql);

    print_r($result);


    }
}
