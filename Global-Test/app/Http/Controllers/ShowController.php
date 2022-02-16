<?php

namespace App\Http\Controllers;

use App\Show;
use App\RunnerFormLast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        var_dump($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function show(Show $show, $id)
    {

        $data= array();

        $data2= array();

        $sql = DB::select("SELECT m.id AS `mId`, m.name AS `mName`,  r.id AS `raceId`, r.name AS `rName`,
        run.id AS `runId`, run.name AS `runName`,run_form.id AS `run_formId`, run_form.age AS `run_formAge`,
        run_form.color AS `run_formColor`, run_form.sex AS `run_formSex`, run_form.owner AS `run_formOwner`,
        run_form.career AS `run_formCareer`, run_form.first AS `run_formFirst`, run_form.second AS `run_formSecond`,
        run_form.third AS `run_formThird`, run_form.created_at AS `run_formCreatedDate`
        FROM meetings AS m INNER JOIN races AS r ON r.meeting_id = m.id
        INNER JOIN runners AS run ON run.race_id = r.id
        INNER JOIN `runner_forms` AS run_form ON run_form.runner_id = run.id WHERE run.id = '$id' ;
        ");

$idLast = DB::table('runner_form_lasts')-> insertGetId(array(
    'runner_id' => $sql[0]->runId,
    'age' =>$sql[0]->run_formAge,
    'color'=>$sql[0]->run_formColor,
    'sex'=>$sql[0]->run_formSex,
    'owner'=>$sql[0]->run_formOwner,
    'career'=>$sql[0]->run_formCareer,
    'first'=>$sql[0]->run_formFirst,
    'second'=>$sql[0]->run_formSecond,
    'third'=>$sql[0]->run_formThird,
    ));

    sleep(3);


    foreach($sql as $dataLast2){

        $data  = [
            'meeting_id' => $dataLast2->mId,
            'meeting_name' => $dataLast2->mName,

            'race_id' => $dataLast2->raceId,
            'race_name' => $dataLast2->rName,
            'runner_id' => $dataLast2->runId,
            'runner_name' => $dataLast2->runName,
            'runner_form_id' => $dataLast2->run_formId,
            'runner_form_age' => $dataLast2->run_formAge,
            'runner_form_color' => $dataLast2->run_formColor,
            'runner_form_sex' => $dataLast2->run_formSex,
            'runner_form_owner' => $dataLast2->run_formOwner,
            'runner_form_career' => $dataLast2->run_formCareer,
            'runner_form_first' => $dataLast2->run_formFirst,
            'runner_form_second' => $dataLast2->run_formSecond,
            'runner_form_third' => $dataLast2->run_formThird,
            'runner_form_created' => $dataLast2->run_formCreatedDate

        ];
    }







    //$id +=1;

if($id == 1){

    $dataLast2 = DB::select("SELECT * FROM `runner_form_lasts` WHERE runner_form_lasts.id = '$id'");
    foreach($dataLast2 as $dataLast3){

        $data2['lastRuns']  = [
            'runner_id' => $dataLast3->runner_id,
            'career' => $dataLast3->career,
            'first' => $dataLast3->first,
            'second' => $dataLast3->second,
            'third' => $dataLast3->third,
            'id' => $id,

        ];
       // $i = $i + 1;

    }

    $output = array_merge($data, $data2);


$result_set =  json_encode($output);
print_r($result_set);


}else{

$id -= 1;
    $dataLast2 = DB::select("SELECT * FROM `runner_form_lasts` WHERE runner_form_lasts.id = '$id'");

   // $i=1;

foreach($dataLast2 as $dataLast3){

    $data2['lastRuns']  = [
        'runner_id' => $dataLast3->runner_id,
        'career' => $dataLast3->career,
        'first' => $dataLast3->first,
        'second' => $dataLast3->second,
        'third' => $dataLast3->third,
        'id' => $id,

    ];
   // $i = $i + 1;

}

$output = array_merge($data, $data2);


$result_set =  json_encode($output);
print_r($result_set);
    }























// if($id > 1){

//     $idLast= DB::table('runner_form_lasts')-> insertGetId(array(
//         'runner_id' => $sql[0]->runId,
//         'age' =>$sql[0]->run_formAge,
//         'color'=>$sql[0]->run_formColor,
//         'sex'=>$sql[0]->run_formSex,
//         'owner'=>$sql[0]->run_formOwner,
//         'career'=>$sql[0]->run_formCareer,
//         'first'=>$sql[0]->run_formFirst,
//         'second'=>$sql[0]->run_formSecond,
//         'third'=>$sql[0]->run_formThird,
//         ));
//     sleep(4);
//         $dataLast = DB::select("SELECT * FROM `runner_form_lasts` WHERE runner_form_lasts.runner_id = '$idLast'");


//         // $data= array();

//         // foreach($dataLast as $dataLast2){

//         //     $data['LastRuns']  = [
//         //         'runner_name' => $dataLast2->age,
//         //         'sex' => $dataLast2->sex,

//         //         'owner' => $dataLast2->owner,

//         //     ];


//         // }

//       //  $result_set =  json_encode($data);


//         $output = array_merge($sql, $dataLast);

//         $result_set =  json_encode($output);

//         print_r($result_set);

// }
// else{
//     $result_set =  json_encode($sql);

//     print_r($result_set);
//     //return false;
// }










      //  $counts = DB::table('runner_form_lasts')->count();
       // $count = RunnerFormLast::count();
       // $lastReord_id = RunnerFormLast::latest('id')->first();
      //  $lastReord_id = DB::table('runner_form_lasts')->latest('runner_id')->first('runner_id');
     // $data = RunnerFormLast::latest('id')->first('runner_id');
     // $id = $data->id;









    //    sleep(4);
    //      if($id > 1){

    // $dataLast = DB::select("SELECT * FROM `runner_form_lasts` WHERE runner_form_lasts.runner_id = '$id'");
    //         // $dataLast = DB::select("SELECT *
    //         // FROM `runner_form_lasts` AS run
    //         // WHERE run.runner_id = (
    //         //     SELECT MAX(runner_form_lasts.runner_id)
    //         //       FROM runner_form_lasts)");


    //    // $dataLast =   DB::table('runner_form_lasts')->orderBy('id','desc')->first();
    //         $output = array_merge($sql, $dataLast);

    //         $result_set =  json_encode($output);

    //         print_r($result_set);
    //      }else{
    //        $result_set =  json_encode($sql);

    //         print_r($result_set);
    //      }






    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $show)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        //
    }
}
