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

        return view('employee.employee')->with('emp',$emp);

    }


    public function create() {


        $bank = DB::table('bank')
                ->select('id', 'bank_name')
                ->get();

        $dept = DB::table('department')
                ->select('*')
                ->get();


        $type_employee = DB::table('type_employee')
                ->select('*')
                ->get();

        return view('employee.create_employee',compact('dept', 'bank', 'type_employee'));
    }

    //insert
    public function store(Request $request)
    {


        //validate data
        // $rules = [
        //     'id' => 'required',
        //     'emp_name' => 'required',
        //     'emp_surname' => 'required',
        //     'emp_en_name' => 'required',
        //     'emp_en_surname' => 'required',
        //     'emp_nickname' => 'required',
        //     'emp_start_work' => 'required',
        //     'emp_start_emp' => 'required',
        //     'emp_name' => 'required',
        //     'dept_id' => 'required',
        //     'team_id' => 'required',
        //     'pos_id' => 'required',
        //     'emp_birthday' => 'required',
        //     'emp_numberID' => 'required',
        //     'bank_numberID' => 'required',
        //     'bank_id' => 'required',
        //     'emp_phone' => 'required',
        //     'address' => 'required',
        //     'current_address' => 'required',
        //     'emp_e_mail' => 'required',
        //     'type_employee' => 'required',
        //     'salary' => 'required',
        // ];

        // $request->validate($rules);
        $start = date("Y-m-d",strtotime($request->emp_start_work));
        $start_emp = date("Y-m-d",strtotime($request->emp_start_emp));
        $birthday = date("Y-m-d",strtotime($request->emp_birthday));

        $emp = new employee;
        $emp->id = $request->id;
        $emp->emp_name = $request->emp_name;
        $emp->emp_surname = $request->emp_surname;
        $emp->emp_en_name = $request->emp_en_name;
        $emp->emp_en_surname = $request->emp_en_surname;
        $emp->emp_nickname = $request->emp_nickname;
        $emp->emp_start_work = $start;
        $emp->emp_start_emp = $start_emp;
        $emp->dept_id = $request->sub_detp_name;
        $emp->team_id = $request->sub_detp;
        $emp->pos_id = $request->sub_team;
        $emp->emp_birthday = $birthday;
        $emp->emp_numberID = $request->emp_numberID;
        $emp->emp_bankID = $request->bank_numberID;
        $emp->bank_id = $request->sub_bank;
        $emp->emp_phone = $request->emp_phone;
        $emp->emp_address = $request->address;
        $emp->current_address = $request->current_address;
        $emp->emp_e_mail = $request->emp_e_mail;
        $emp->comp_e_mail = $request->comp_e_mail;
        $emp->type_emp_id = $request->sub_type;
        $emp->salary = $request->salary;
        $emp->other = $request->other;
        $emp->save();

        return redirect()->route('employee.employee')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }



    public function GetSubDept($id){
        return json_encode(DB::table('team')->where('dept_id',$id)->get());
    }

    public function GetSubTeam($id){
        return json_encode(DB::table('position')->where('team_id',$id)->get());
    }


}
