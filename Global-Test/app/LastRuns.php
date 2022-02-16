<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LastRuns extends Model
{
    protected $fillable = [
        'runner_form_id',
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
