<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    public function show(){
        $data = Employee::all();
        return view('employee',['employees'=>$data]);
    }
}
