<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    //

    protected $fillable = ['qr_code_id','student_id','recorded'];


    /**
     * Relationship - qr code who owns this record
     *
     * @return BelongsTo
     */
    public function qrCode() {
        return $this->belongsTo(Qr_code::class, 'qr_code_id');
    }


    /**
     * Relationship - student who owns this record
     *
     * @return BelongsTo
     */
    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
