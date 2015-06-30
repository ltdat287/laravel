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
    /**
     * @return $this
     */
    public function store()
    {
        $student = Request::all();
        $valids = Validator::make($student,[
            'fullname' => 'required|min:6',
            'address' => 'required|min:6',
            'email' => 'email|required'
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

    /**
     * Show info student use $id
     * @param $id
     * @return $this
     */
    public function show($id)
    {
        $data = Student::find($id);
        return view('student.edit')->with('data',$data);
    }

    public function update($id)
    {
        $data = Request::all();
        $valids = Validator::make($data,[
            'fullname' => 'required|min:6',
            'address' => 'required|min:6',
            'email' => 'email|required'
        ]);
        if ($valids->fails()){
            return view('student.insert')->with('errors',$valids->messages());
        } else{
        extract($data);
            Student::where('id','=',$id)->update(
                [
                    'fullname' => $fullname,
                    'address' => $address,
                    'email' => $email,
                    'phone' => $phone,
                    'gender' => $gender
                ]);
            return redirect()->route('student.list');
        }
    }
}

