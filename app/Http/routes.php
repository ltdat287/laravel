<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('login', function () {
    return view('login');
});

Route::get('/', function(){
    return view('student.list');
});

Route::get('register', function () {
    return view('register');
});

Route::post('register', 'UsertestController@store');


Route::post('login', 'UsertestController@login');

Route::get('student/list',
    [
        'as' => 'student.list',
        'uses' => 'PageController@studentlist'
    ]);

Route::post('student/insert',
    [
        'as' => 'student.insert',
        'uses' => 'StudentController@store'
    ]);

Route::get('student/insert',function()
{
    return view('student.insert');
});

Route::get('student/edit/{id}',[
    'as' => 'student.edit',
    'uses' => 'StudentController@show'
]);

Route::post('student/edit/{id}','StudentController@update');

Route::get('student/destroy/{id}','StudentController@destroy');

//Get info about list class
Route::get('class/list',['as' => 'list.class','uses' => 'ClassController@index']);

//add request insert info classname
Route::post('class/add','ClassController@create');

Route::get('class/add','ClassController@create');

//delete class from class list
Route::get('class/delete/{id}','ClassController@destroy');

//edit information class from class list
Route::get('class/edit/{id}', ['as' => 'edit.class', 'uses' => 'ClassController@edit']);

//send change info class from class post form
Route::post('class/edit/{id}', ['as' => 'edit.comp.class', 'uses' => 'ClassController@update']);

//get information to choosen class for student
Route::get('class/selectclass/{id}', ['as' => 'select.class', 'uses' => 'ClassController@selectClass']);

//post select class for student
Route::post('class/selectclass/{id}', ['as' => 'select.class.conf', 'uses' => 'ClassController@updateClass']);

//get list student from class
Route::get('class/liststudent/{id}', ['as' => 'class.liststudent', 'users' => 'ClassController@getStudent']);