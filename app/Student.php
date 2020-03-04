<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;


    // Specifying the columns to be filled in the students table
    protected $fillable =['user_id','index_number'];

}
