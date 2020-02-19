<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [ 'user_id','course_code', 'course_name'];

    public $timestamps = false;

}
