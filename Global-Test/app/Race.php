<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $fillable = [
        'meeting_id',
        'name',
        'external_id'
    ];
}
