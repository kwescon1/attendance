<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //

    protected $fillable = ['qr_code_id','student_id','recorded'];
}
