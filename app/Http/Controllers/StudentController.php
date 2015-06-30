<?php

namespace App\Http\Controllers;

use App\Student;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Request;

class StudentController extends Controller
{
    //
    public function store()
    {
        $student = Request::all();
        $valids = Validator::make($student,[
            'fullname' => 'required|min:6',
            'address' => 'required|min:6',
            'email' => 'email|required',
        ]);
        if ($valids->fails()){
            return view('student.insert')->with('errors',$valids->messages());
        } else{
        //convert array() student to $key of array student
            extract($student);
            Student::create(
                [
                    'fullname' => $fullname,
                    'address' => $address,
                    'email' => $email,
                    'phone' => $phone,
                    'gender' => $gender
                ]);
            $result = 'Đăng ký thành công';
            return view('student.insert')->with('result',$result);
        }
    }
}

