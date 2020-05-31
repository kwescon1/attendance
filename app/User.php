<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function courses() {
    //     return $this->hasMany(Course::class, 'user_id');
    // }

    public $timestamps = false;


    /**
     * Relationship - user who is a lecturer
     *
     * @return HasOne
     */
    public function lecturer() {
        return $this->hasOne(Lecturer::class, 'user_id');
    }

    /**
     * Relationship - user who is a student
     *
     * @return HasOne
     */
    public function student() {
        return $this->hasOne(Student::class, 'user_id');
    }

    /**
     * Check if user is lecturer
     *
     * @return boolean
     */
    public function isLecturer() {
        return $this->role_id == 2;
    }

    /**
     * Check if user is student
     *
     * @return boolean
     */
    public function isStudent() {
        return $this->role_id == 1;
    }
}
