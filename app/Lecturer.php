<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    //
    protected $fillable = ['user_id','name'];

    public $timestamps = false;
    
}
