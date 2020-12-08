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

Route::get('/', 'App\Http\Controllers\WebController@home');
Route::get('home', 'App\Http\Controllers\WebController@home');
Route::get('manage', 'App\Http\Controllers\WebController@manage');
Route::get('working', 'App\Http\Controllers\WebController@working');
Route::get('report', 'App\Http\Controllers\WebController@report');
Route::get('contact', 'WebController@contact');
Route::get('employee','App\Http\Controllers\employeeController@info');


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