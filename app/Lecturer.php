<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    //Columns of the database that needs to be filled

    protected $fillables = ['firstname','lastname','email','password'

    ];
}
