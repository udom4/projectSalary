<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\EmployeeController;

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

//home 
Route::get('/', 'App\Http\Controllers\WebController@home', function(){
    return view('home');
})->name('home');

//manage
Route::get('manage', 'App\Http\Controllers\WebController@manage', function(){
    return view('manage.manage');
})->name('manage');

//working
Route::get('working', 'App\Http\Controllers\WebController@working', function(){
    return view('working.working');
})->name('working');

//report
Route::get('report', 'App\Http\Controllers\WebController@report', function(){
    return view('report.report');
})->name('report');


//department

Route::get('/department', 'App\Http\Controllers\departmentController@info' ,function () {
    return view('department.department');
})->name('department.department');
Route::get('/create', 'App\Http\Controllers\departmentController@create' ,function () {
    return view('department.create');
})->name('department.create');
Route::post('/department/store', 'App\Http\Controllers\departmentController@store' ,function () {
    return view('welcome');
})->name('department.store');
Route::get('/edit{id}', 'App\Http\Controllers\departmentController@edit' ,function () {
    return view('department.edit');
})->name('department.edit');
Route::post('/department/update{id}', 'App\Http\Controllers\departmentController@update' ,function () {
    return view('welcome');
})->name('department.update');
Route::get('/deleteDepartment{id}', 'App\Http\Controllers\departmentController@destroy', function(){
    return view('department.department');
})->name('department.destroy');


//team




Route::get('/log_action/{id}/{table}','LogController@index');
Route::get('/delete_worker/{id}','WorkerController@destroy');

Route::get('contact', 'WebController@contact');
Route::get('employee','App\Http\Controllers\employeeController@info');