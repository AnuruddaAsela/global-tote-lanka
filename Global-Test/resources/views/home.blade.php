<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sandown</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    </head>
    <body>



            <div class="container">
                <div class="row">
                <nav class="navbar navbar-dark bg-dark" style="margin-top: 6%;">
                        <div class="container-fluid">

                          <?php $meater = explode("-", $meeting[0]->name); ?>
                          <a class="navbar-brand">SandDown   Runner :{{ $meater[1]}}</a>
                        </div>
                      </nav>

                        <div class="row">

                            @foreach ($races as $race )


                            <div class="card bg-light mt-3 " style="max-width: 10rem;">
                                <div class="card-header" id="header{{$race->id}}">{{$race->name}}
                                  <span   id="close{{$race->id}}" class="rounded-circle " style="color: red;display: none;">Closed</span>

                                </div>
                            </div>
                            @endforeach

                    </div>


                </div>

                <div class="row">

                    <div class="card mt-2" style="width: 90rem;">
                        <div class="card-body">
                         <h5 class="card-title" id='title'>Click Form To Start!!</h5>

                          <div class="card text-center">
                            <div class="card-header">
                              <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                  <a class="nav-link active" id="nav_form"  onclick="getAllData();" style="cursor: pointer">Form</a>
                                </li>

                              </ul>
                            </div>
                            <div class="card-body">

                              <div class="row">

                                <div class="card mt-2">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <span>Age :</span>
                                            <label id="age"></label>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>Sex :</span>
                                            <label id="sex"></label>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>Color :</span>
                                            <label id="color"></label>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>Owner :</span>
                                            <label id="owner"></label>
                                        </div>

                                    </div>
                                  <div class="card-header">

                                    <div class="row">
                                      <div class="col-sm-3">
                                    <label>Career</label>
                                    <label id="career"></label>



                                      </div>
                                      <div class="col-sm-3">
                                        <label>First</label>
                                    <label id="first"></label>


                                   </div>
                                          <div class="col-sm-3">
                                            <label>Second</label>
                                    <label id="second"></label>


                                          </div>
                                              <div class="col-sm-3">
                                                <label>Third</label>
                                                <label id="third"></label>

                                               </div>
                                    </div>
                                    </div>

                                    <div class="card-header mt-2">

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label>Last Career</label>
                                                <label id="l_career"></label>

                                               </div>
                                               <div class="col-sm-3">
                                                <label>Last First</label>
                                                <label id="l_first"></label>

                                               </div>
                                               <div class="col-sm-3">
                                                <label>Last Second</label>
                                                <label id="l_second"></label>

                                               </div>

                                               <div class="col-sm-3">
                                                <label>Last Third</label>
                                                <label id="l_third"></label>

                                               </div>

                                        </div>
                                    </div>
                          </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


        <script>


      function getAllData(){
        document.getElementById("nav_form").innerText = "Ongoing";

            $.ajax({
                url:'{{route('getAllData')}}',
                type: 'GET',
                success: function (data) {
                    //alert(data);

                    json_value = JSON.parse(data);

                   // console.log(json_value[0].mName);
//alert(JSON.stringify(json_value[0]));

                    for($i = 0; $i <= json_value.length; $i++ ){
                        if($i == json_value.length){
                            return false;
                        }else{
                            //setTimeout( 5000);

                            run_id = json_value[$i].runId;

                            getData(run_id);


                        }



                    }



                }
            });

      }



        function getData(id) {

                var url = '{{ route("getData", ":id") }}';
                url = url.replace(':id', id);

                $.ajax({
                    url:url,
                    type: 'GET',
                    success: function (data) {

                        //console.log(data);

                        // converting to the json parse encode values and each attributes values store to each variales

                      json_value = JSON.parse(data);
                     console.log(json_value);

                      data  = {

                        'meeting_id' : json_value.meeting_id,
                        'meeting_name' :  json_value.meeting_name,
                        'race_id' : json_value.race_id,
                        'race_name' : json_value.race_name,
                        'runner_name' : json_value.runner_name,
                        'runner_form_id' : json_value.runner_form_id,
                        'runner_form_age' : json_value.runner_form_age,
                        'runner_form_color' : json_value.runner_form_color,
                        'runner_form_sex' : json_value.runner_form_sex,
                        'runner_form_owner' : json_value.runner_form_owner,
                        'runner_form_career' : json_value.runner_form_career,
                        'runner_form_first' : json_value.runner_form_first,
                        'runner_form_second' : json_value.runner_form_second,
                        'runner_form_third' : json_value.runner_form_third,
                        'runner_form_created' : json_value.runner_form_created,


                        lastRuns : {
                            'career' :  json_value.lastRuns.career,
                            'first' : json_value.lastRuns.first,
                            'second' : json_value.lastRuns.second,
                            'third' : json_value.lastRuns.third,
                            'id' : json_value.lastRuns.id

                        }
                    }

                    document.getElementById("sex").innerText = data.runner_form_sex;
                    document.getElementById("title").innerText = data.runner_name;

                    document.getElementById("close"+data.race_id).style.display = 'block';
                    document.getElementById("sex").innerText = data.runner_form_sex;
                    document.getElementById("title").innerText = data.runner_name;
                    document.getElementById("color").innerText = data.runner_form_color;
                    document.getElementById("age").innerText = data.runner_form_age;
                    document.getElementById("owner").innerText = data.runner_form_owner;
                    document.getElementById("career").innerText = data.runner_form_career;
                    document.getElementById("first").innerText = data.runner_form_first;
                    document.getElementById("second").innerText = data.runner_form_second;
                    document.getElementById("third").innerText = data.runner_form_third;


                        // last form runs set values
                        if(data.lastRuns.id > 1){

                    document.getElementById("l_career").innerText = data.lastRuns.career;
                    document.getElementById("l_first").innerText = data.lastRuns.first;
                    document.getElementById("l_second").innerText = data.lastRuns.second;
                    document.getElementById("l_third").innerText = data.lastRuns.third;



                        }else{
                            document.getElementById("l_career").innerText = 0;
                    document.getElementById("l_first").innerText = 0;
                    document.getElementById("l_second").innerText = 0;
                    document.getElementById("l_third").innerText = 0;

                        }















                    }


                });

        }






        </script>










    </body>


</html>
