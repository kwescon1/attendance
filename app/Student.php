<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    public $timestamps = false;


    // Specifying the columns to be filled in the students table
    protected $fillable =['user_id','index_number'];



    public function user(){
       return $this->belongsTo(User::class,'user_id');

    }

    /**
     * Relationship - a student has many records
     *
     * @return HasMany
     */
    public function records() {
        return $this->hasMany(Record::class, 'student_id');
    }

}
