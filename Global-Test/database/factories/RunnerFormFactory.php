<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Runner;
use App\RunnerForm;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

$factory->define(RunnerForm::class, function (Faker $faker) {

  $collection = collect(['1-0-0-1','0-0-0-1','0-1-0-1','0-0-0-0','1-1-1-1']);
  $Career = collect(['8-0-2-1','9-8-0-5','6-3-4-2','2-5-3-9','1-9-5-7']);
  $sex = collect(['M','F','G']);
  $sexs = $sex->shuffle();

  $sexs->all();

  $Careers = $Career->shuffle();

  $Careers->all();

  $shuffled = $collection->shuffle();

  $shuffled->all();


    return [
    'age' => $faker->randomDigit(0.1),
        'color' => $faker->colorName,
        'sex' => $faker->randomElement($sexs),
        'owner' => $faker->name,
        'career' => $faker->randomElement($Careers),
        'first' => $faker->randomElement($shuffled),
        'second' => $faker->randomElement($shuffled),
        'third' => $faker->randomElement($shuffled),
       'runner_id' => $faker->unique()->numberBetween(1, App\Runner::count()),


    ];
});
