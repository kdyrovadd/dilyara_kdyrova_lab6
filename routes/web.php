<?php
use App\Models\Student;
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

Route::get('/insert', function () {
    DB::insert("insert into students(name, date_of_birth, GPA, advisor) values('Dilyara', '2020-10-27', 3.81, 'Kurmangazy K')");
});

Route::get('/select', function () {
    $results = DB::select("select * from students");
    foreach($results as $i) {
    	echo "Name is ".$i->name."<br>";
        echo "Date of birth is ".$i->date_of_birth."<br>";
    	echo "GPA is ".$i->GPA."<br>";
    	echo "Advisor is ".$i->advisor."<br>";
        echo "<br>";
    }
});

Route::get('/update', function () {
    $updated = DB::update("update students set advisor = 'Aigul B' where id = 1");
    return $updated;
});

Route::get('/delete', function () {
    $deleted = DB::delete("delete from students where id = 1");
    return $deleted;
});

Route::get('/insert2', function () {
    $st=new Student;
    $st->name='Aigul';
    $st->date_of_birth='2002-06-02';
    $st->GPA=3.61;
    $st->advisor='Aidar S';
    $st->save();
});

Route::get('/update2', function () {
    $st=Student::find(3);
    $st->GPA=3.65;
    $st->save();
});

Route::get('/delete2', function() {
    Student::destroy(3);
});

Route::get('select2', function() {
    $st=Student::all();
    foreach ($st as $i) {
        echo "<b>$i->id</b>".". ";
        echo $i->name." <br>";
        echo $i->date_of_birth." <br>";
        echo $i->GPA." <br>";
        echo $i->advisor." <br>";
        echo "<br>";
    }
});