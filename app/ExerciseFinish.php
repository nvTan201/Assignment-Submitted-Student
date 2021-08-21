<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseFinish extends Model
{
    protected $table = 'exercise_finish';

    public $timestamps = false;
    public $primaryKey = 'idExerciseFinish';
}
