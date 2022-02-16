<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RunnerForm extends Model
{
    protected $fillable = [
        'runner_id',
        'age',
        'color',
        'sex',
        'owner',
        'career',
        'first',
        'second',
        'third'
    ];
}
