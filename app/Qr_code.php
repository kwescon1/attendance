<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qr_code extends Model
{
    //

    protected $fillable = ['image','lecturer_id','course_id'];
}
