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
Route::post('/department/search',['as' => 'search-dept','uses' => 'App\Http\Controllers\departmentController@searchDept']);


//team
Route::get('/team{id}', 'App\Http\Controllers\teamController@info', function(){
    return view('team');
})->name('team');
Route::get('/create_team{id}', 'App\Http\Controllers\teamController@create' ,function () {
    return view('department.team.create_team');
})->name('team.create');
Route::post('/team/store', 'App\Http\Controllers\teamController@store' ,function () {
    return view('welcome');
})->name('team.store');
Route::get('team/edit_team{id}', 'App\Http\Controllers\teamController@edit_team' ,function () {
    return view('team.edit_team');
})->name('team.edit_team');
Route::post('/team/update{id}', 'App\Http\Controllers\teamController@update_team' ,function () {
    return view('welcome');
})->name('team.update');
Route::get('/deleteTeam{id}', 'App\Http\Controllers\teamController@destroy', function(){
    return view('department.team');
})->name('team.destroy');
Route::post('/team/search',['as' => 'search-team' , 'uses' => 'App\Http\Controllers\teamController@searchTeam']);

//position
Route::get('/position{id}', 'App\Http\Controllers\positionController@info', function(){
    return view('position');
})->name('position');
Route::get('/create_position{id}', 'App\Http\Controllers\positionController@create' ,function () {
    return view('position.create_position');
})->name('position.create');
Route::post('/position/store', 'App\Http\Controllers\positionController@store' ,function () {
    return view('welcome');
})->name('position.store');
Route::get('team/edit_position{id}', 'App\Http\Controllers\positionController@edit_position' ,function () {
    return view('position.edit_position');
})->name('position.edit_position');
Route::post('/position/update{id}', 'App\Http\Controllers\positionController@update_position' ,function () {
    return view('welcome');
})->name('position.update');
Route::get('/deletePosition{id}', 'App\Http\Controllers\positionController@destroy', function(){
    return view('position.team');
})->name('position.destroy');
Route::post('/position/search',['as' => 'search-pos' , 'uses' => 'App\Http\Controllers\positionController@searchPosition']);

//employee
Route::get('/employee', 'App\Http\Controllers\employeeController@info', function(){
    return view('employee');
})->name('employee');
Route::get('/employee/employeeDesc{id}', 'App\Http\Controllers\employeeController@desc', function(){
    return view('employee.employee_desc');
})->name('employee.employee_desc');
Route::get('/create_employee', 'App\Http\Controllers\employeeController@create' ,function () {
    return view('employee.create_employee');
})->name('employee.create');
Route::post('/employee/store', 'App\Http\Controllers\employeeController@store' ,function () {
    return view('welcome');
})->name('employee.store');
Route::get('employee/edit_employee{id}', 'App\Http\Controllers\employeeController@edit_employee' ,function () {
    return view('employee.edit_employee');
})->name('employee.edit_employee');
Route::post('/employee/update{id}', 'App\Http\Controllers\employeeController@update_employee' ,function () {
    return view('welcome');
})->name('employee.update');
Route::get('/deleteEmployee{id}', 'App\Http\Controllers\employeeController@destroy', function(){
    return view('employee');
})->name('employee.destroy');
Route::get('GetSubDept/{id}','App\Http\Controllers\employeeController@GetSubDept');
Route::get('GetSubTeam/{id}','App\Http\Controllers\employeeController@GetSubTeam');
Route::post('/employee/search',['as' => 'search-emp' , 'uses' => 'App\Http\Controllers\employeeController@searchEmployee']);




Route::get('/log_action/{id}/{table}','LogController@index');
Route::get('/delete_worker/{id}','WorkerController@destroy');
Route::get('contact', 'WebController@contact');
