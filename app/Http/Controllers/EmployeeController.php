<?php

namespace App\Http\Controllers;
use DB;
use App\employee;
use App\bank;
use App\department;
use App\position;
use App\team;
use App\type_employee;


use Illuminate\Http\Request;

class employeeController extends Controller
{
    //
    public function info(){
        $emp = DB::table('employee')
        ->join('department','employee.de_id','=','department.de_id')
        ->join('team','employee.team_id','=','team.team_id')
        ->join('position','employee.pos_id','=','position.pos_id')
        ->join('bank','employee.bank_id','=','bank.bank_id')
        ->join('type_employee','type_employee.type_emp_id','employee.type_emp_id')
        ->select('*')
        ->get();

        $employ = $emp;
        return view('employee.employee',compact('emp','employ'));

    }
}
