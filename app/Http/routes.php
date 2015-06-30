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

/*Route::get('/', function()
{
    return view('login');
});*/

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