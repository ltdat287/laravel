<?php

namespace App\Http\Controllers;

use App\Classname;
use App\Student;
// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Request;


class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $data = Classname::all();
        return view('class/list')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        //
        if (!isset($request))
        {
            return redirect()->route('class/add');
        }
        // Check Valids and store request
        $classname = $request->input('classname');
        $amount = $request->input('amount');
        $valids = Validator::make($request->all(),[
            'classname' => 'required|max:6',
            'amount' => 'required|max:6'
            ]);
        if ($valids->fails())
        {
            return view('class/add')->with('errors',$valids->messages());
        }
        Classname::create([
            'classname' => $classname,
            'amount' => $amount
            ]);
        $result = 'Bạn đã thêm lớp mới thành công';
        $data = Classname::all();
        return view('class/list')->with('result',$result)->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *s
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        //check id
        // if (!isset($id))
        // {
        //     return redirect()->route('list.class');
        // }

        //find info class with id;
        $result = Classname::find($id);

        //check class if exist return $data
        if (!isset($result))
        {
            return redirect()->route('list.class');
        }
        $data = array(
            'id'        =>  $id,
            'result'    =>  $result,
            );

        return view('class.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //search $id from database
        $class = Classname::find($id);
        if (!isset($class))
        {
            return redirect()->route('list.class');
        }
        //Validator request send from client
        $valids = Validator::make(Request::all(),[
            'classname' =>  'required|min:2|max:6',
            'amount'    =>  'required|digits_between:2,6'
            ]);
        if ($valids->fails())
        {
            $errors = $valids->messages();
            return redirect()->back()->with('errors',$errors);

        } else{
            $class->classname   =   Request::input('classname');
            $class->amount      =   Request::input('amount');
            $class->save();
            $result = 'Chỉnh sửa thông tin thành công';

            return view('class.comp')->with('result',$result);
        }       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //search Id class in database;
        $searchId = Classname::find($id);
        if (!isset($searchId))
        {
            echo 'Không thể xóa lớp';
        }
        //if has Id class from database run delete query;
        $desstroy = Classname::where('id',$id)->delete();
        return redirect()->route('class/list');
    }
    

    public function selectClass($id)
    {
        $user = Student::find($id);
        if (!isset($user)){
            return redirect()->back();
        }
        $data = Classname::all();
        $result = array(
            'user'  =>  $user,
            'data'  =>  $data     
            );

        return view('class/selectclass',$result);
    }

    public function updateClass($id)
    {
        //check exist user_id
        // dd($id);
        $user = Student::find($id);
        // dd($user);
        if (!isset($user)){
            return redirect()->back();
        }
        // dd(Request::input('classradio'));
        $valids = Validator::make(Request::all(), [
            'classradio'  =>   'required|min:1'
            ]);
        // dd($valids->messages());
        if ($valids->fails()){
            // $errors = $valids->messages();
            return redirect()->back()->withErrors($valids);
        }
        //check exist class_id from request
        $class_id = Request::input('classradio');
        $class = Classname::find($class_id);
        if (!isset($class)){
            return reduirect()->back()->withErrors('Lớp không tồn tại');
        }
        //update class for student
        $user->class = $class->classname;
        $user->class_id = $class->id;
        $user->save();
        $class->amount = $class->amount - 1;
        $class->save();
        $result = 'Thêm lớp cho sinh viên thành công';

        return view('class/comp')->with('result',$result);
    }

    //get list student from class
    public function getStudent($id)
    {
        
    }
}
