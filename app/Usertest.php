<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertest extends Model
{
    //
    protected $table = 'user_test';
    protected $fillable = array('username','password','email');
}
