<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Qr_code extends Model
{
    //

    protected $fillable = ['image','lecturer_id','course_id', 'time'];

    protected $table = "qr_codes";

    public function lecturer() {

    	return $this->belongsTo(Lecturer::class);
    }

    /**
     * Relationship - course which owns this qr code
     *
     * @return BelongsTo
     */
    public function course() {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Get image attribute
     *
     * @return string
     */

    public function getImageAttribute($value) {
        return asset("images/codes/$value");
    }

     /**
     * Relationship - qr code has many records
     *
     * @return hasMany
     */

    public function records()
    {
        return $this->hasMany(Record::class, 'qr_code_id');
    }

}
