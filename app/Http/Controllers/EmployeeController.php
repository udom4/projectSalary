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
        ->join('department','employee.dept_id','=','department.id')
        ->join('team','employee.team_id','=','team.id')
        ->join('position','employee.pos_id','=','position.id')
        ->join('bank','employee.bank_id','=','bank.id')
        ->join('type_employee','type_employee.id','employee.type_emp_id')
        ->select('*')
        ->get();

        $employ = $emp;
        return view('employee.employee',compact('emp','employ'));

    }


    public function create() {
        $emp = DB::table('department')
        ->select('*')
        ->get();

        $bank = DB::table('bank')
        ->select('*')
        ->get();

        $dept = DB::table('department')->pluck('dept_name', 'id');

        $team = team::pluck('team_name','id');

        $position = DB::table('position')
        ->select('*')
        ->get();

        $type_employee = DB::table('type_employee')
        ->select('*')
        ->get();

        return view('employee.create_employee',compact('dept', 'bank', 'dept', 'position', 'type_employee', 'team'));
    }

    public function findTeamID($id){
        $team - team::where('dept_id',$id)->get();
        return response()->json($team);
    }

    

}
