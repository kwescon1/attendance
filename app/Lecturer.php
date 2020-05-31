<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lecturer extends Model
{
    //
    protected $fillable = ['user_id','name'];

    public $timestamps = false;


    public function courses() {

    	return $this->hasMany(Course::class, 'lecturer_id');
    }

    public function qr_codes() {

    	return $this->hasMany(Qr_code::class, 'lecturer_id');
    }


    /**
     * Relationship - lecturer who is a user
     *
     * @return BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
