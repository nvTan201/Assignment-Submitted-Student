<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factory\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    // use HasFactory;
    protected $table = 'grade';

    public $timestamps = false;
    public $primaryKey = 'idGrade';
}
