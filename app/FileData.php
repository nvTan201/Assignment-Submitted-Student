<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileData extends Model
{
    protected $table = 'exercise_finish';

    public $timestamps = false;
    public $primaryKey = 'idExerciseFinish';
}
