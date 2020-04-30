<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    //
    protected $fillable = ['user_id','name'];

    public $timestamps = false;
    

    public function courses() {

    	return $this->hasMany(Course::class, 'lecturer_id');
    }

    public function qr_codes() {

    	return $this->hasMany(Qr_code::class);
    }
}
