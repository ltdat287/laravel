<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Usertest;
//use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use Input;
use Request;
use Validator;

class UsertestController extends Controller
{

    public function login()
    {
        $data = Request::all();
        //Validator user_input, password input
        $valids = Validator::make($data,[
            'username' => 'required|min:3',
            'password' => 'required|min:6'
        ]);
        //Throw messages error if it fails
        if ($valids->fails()) {
            return view('login')->with('errors',$valids->messages());
        }
        //Check username and email to login
        extract($data);
        $username = $username;
        $password = md5(sha1($password));
        $check = Usertest::where('username','=',$username)->where('password','=',$password)->count();
        if ($check > 0)
        {
            echo "Dang nhap thanh cong";
        } else{
            $check = Usertest::where('email','=',$username)->where('password','=',$password)->count();
            if ($check > 0)
            {
                echo "Dang nhap thanh cong";
            } else{
                $errors = 'Đăng nhập không thành công';
                return view('login')->with('errors',$errors);
            }
        }
    }


    /**
     * Check username email at database if true to register
     *
     * @param RegisterRequest $request
     * @return $this
     */
    public function store(RegisterRequest $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');
        if (!empty($username) && !empty($password) && !empty($email)){
            $checkuser = Usertest::where('username','=',$username)->count();
            $checkemail = Usertest::where('email','=',$email)->count();
            if ($checkuser > 0){
                $erroruser = 'Tên tài khoản đã được đăng ký';
                return view('register')->with('erroruser',$erroruser);
            }
            if ($checkemail > 0){
                $erroremail = 'Email đã được đăng ký';
                return view('register')->with('erroremail',$erroremail);
            }
            if ($checkemail = 0 && $checkuser = 0){
                Usertest::create(
                    [
                        'username' => $username,
                        'password' => $password,
                        'email' => $email
                    ]);
                $result = 'Đăng ký thành công';
                //return view('register')->with('result',$result);
                echo $rerult;
            }
        } else{
            $error = 'Đăng ký không thành công';
            return view('register')->with('error',$error);
        }
    }
}
