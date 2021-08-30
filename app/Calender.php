<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    protected $table = 'exercise';

    public $timestamps = false;
    public $primaryKey = 'idExercise';
}
