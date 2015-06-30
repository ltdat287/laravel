<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'sinhvien';
    protected $fillable = array('fullname','address','gender','email','phone','class');
}
