<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Qr_code extends Model
{
    //

    protected $fillable = ['image','lecturer_id','course_id'];

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
}
