<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//this route return my first and last name
Route::get('/name', function () {
    return view('myname');
});

Route::get('/faculty', function () {
    return view('facultyname');
});

Route::get('/post/{id}', function ($id) {
    return 'id number is: '.$id;
});

Route::get('u/{name?}', function ($name=null) {
    return $name;
})->where('name','[a-zA-Z]+');

Route::get('/s','StudentController@index');

Route::get('/students/{id}', "StudentController@show");
//this route return string "lab4"
Route::get('/lab', function() {
	return 'lab4';
});