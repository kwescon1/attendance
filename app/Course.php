<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [ 'lecturer_id','course_code', 'course_name'];


    public function lecturer() {
    	return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }

}
