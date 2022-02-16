<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RunnerFormLast extends Model
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
