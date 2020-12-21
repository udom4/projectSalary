<?php

namespace App\Http\Controllers;
use DB;
use App\employee;
use App\bank;
use App\department;
use App\position;
use App\team;
use App\type_employee;
use App\emergency_call;
use App\relation;


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
        ->select('employee.id','emp_id','emp_name','emp_surname','emp_en_name','emp_en_surname','emp_nickname','department.dept_name','team.team_name','position.pos_name','emp_phone','salary','other')
        ->get();

        return view('employee.employee')->with('emp',$emp);

    }


    public function create() {


        $bank = bank::all()->pluck('bank_name', 'id');

        $dept = department::all()->pluck('dept_name', 'id');

        $team = ['' => 'Please Select Department'] ;

        $pos = ['' => 'Please Select Team'] ;


        $type_employee = type_employee::all()->pluck('type_name', 'id');

        return view('employee.create_employee',compact('team','dept', 'bank', 'type_employee','pos'));
    }

    //insert
    public function store(Request $request)
    {


        // validate data
         $rules = [
            'emp_id' => 'required',
            'emp_name' => 'required',
            'emp_surname' => 'required',
            'emp_en_name' => 'required',
            'emp_en_surname' => 'required',
            'emp_nickname' => 'required',
            'emp_start_work' => 'required',
            'emp_start_emp' => 'required',
            'emp_name' => 'required',
            'dept_id' => 'required',
            'team_id' => 'required',
            'pos_id' => 'required',
            'emp_birthday' => 'required',
            'emp_numberID' => 'required',
            'bank_numberID' => 'required',
            'bank_id' => 'required',
            'emp_phone' => 'required',
            'address' => 'required',
            'current_address' => 'required',
            'emp_e_mail' => 'required',
            'type_emp_id' => 'required',
            'salary' => 'required',
        ];

        $request->validate($rules);
        $start = date("Y-m-d",strtotime($request->emp_start_work));
        $start_emp = date("Y-m-d",strtotime($request->emp_start_emp));
        $birthday = date("Y-m-d",strtotime($request->emp_birthday));

        $emp = new employee;
        $emp->emp_id = $request->emp_id;
        $emp->emp_name = $request->emp_name;
        $emp->emp_surname = $request->emp_surname;
        $emp->emp_en_name = $request->emp_en_name;
        $emp->emp_en_surname = $request->emp_en_surname;
        $emp->emp_nickname = $request->emp_nickname;
        $emp->emp_start_work = $start;
        $emp->emp_start_emp = $start_emp;
        $emp->dept_id = $request->dept_id;
        $emp->team_id = $request->team_id;
        $emp->pos_id = $request->pos_id;
        $emp->emp_birthday = $birthday;
        $emp->emp_numberID = $request->emp_numberID;
        $emp->emp_bankID = $request->bank_numberID;
        $emp->bank_id = $request->bank_id;
        $emp->emp_phone = $request->emp_phone;
        $emp->emp_address = $request->address;
        $emp->current_address = $request->current_address;
        $emp->emp_e_mail = $request->emp_e_mail;
        $emp->comp_e_mail = $request->comp_e_mail;
        $emp->type_emp_id = $request->type_emp_id;
        $emp->salary = $request->salary;
        $emp->other = $request->other;
        $emp->save();

        return redirect()->route('employee')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }



    public function GetSubDept($id){
        return json_encode(DB::table('team')->where('dept_id',$id)->get());
    }

    public function GetSubTeam($id){
        return json_encode(DB::table('position')->where('team_id',$id)->get());
    }

    public function edit_employee($id){
        $emp = employee::find($id);

        $dept = department::all()->pluck('dept_name', 'id');

        $team = DB::table('team')
                ->join('employee','employee.team_id', '=', 'team.id')

                ->where ('employee.id' , '=', $id)
                ->pluck('team_name','team.id');

        $pos = DB::table('position')
                ->join('employee','employee.pos_id', '=', 'position.id')
                ->where ('employee.id' , '=', $id)
                ->pluck('pos_name','position.id');

        $bank = bank::all()->pluck('bank_name', 'id');

        $emergency = DB::table('emergency_call')
                ->join('employee','emergency_call.emp_id','=','employee.id')
                ->join('relation','emergency_call.relation_id','=','relation.id')
                ->where ('employee.id','=', $id)
                ->get();


        $type_employee = type_employee::all()->pluck('type_name', 'id');

        // return view('employee.edit_employee',['emp' => $emp , 'dept' => $dept, 'team' => $team, 'pos' => $pos, 'bank' => $bank, 'type_employee' => $type_employee , 'bankID' => $bankID]);
        return view('employee.edit_employee',compact('emp', 'dept', 'team', 'pos', 'type_employee','bank','emergency'));
    }

    public function update_employee(Request $request, $id){
        // validate data
        // $rules = [
        //     'emp_id' => 'required',
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
        //     'comp_e_mail' => 'required',
        //     'type_emp_id' => 'required',
        //     'salary' => 'required',
        // ];

        // $request->validate($rules);

        $emp = employee::find($id);
        $emp->update($request->all());

        $emp->save();
        return redirect()->route('employee')->with('update', 'ข้อมูลสำเร็จ');
    }

    public function destroy($id)
    {
        $emp = employee::find($id);
        $emp->delete();
        return redirect()->route('employee')->with('delete', 'ลบข้อมูลสำเร็จ');
    }

    public function searchEmployee(Request $request)
    {
        if(empty($request)){

            $emp = DB::table('employee')
                ->join('department','employee.dept_id','=','department.id')
                ->join('team','employee.team_id','=','team.id')
                ->join('position','employee.pos_id','=','position.id')
                ->join('bank','employee.bank_id','=','bank.id')
                ->join('type_employee','type_employee.id','employee.type_emp_id')
                ->select('*')
                ->get();
                return json_encode( $emp );

        }

        if(isset($request)){
                $emp = employee::join('department','employee.dept_id','=','department.id')
                ->join('team','employee.team_id','=','team.id')
                ->join('position','employee.pos_id','=','position.id')
                ->join('bank','employee.bank_id','=','bank.id')
                ->join('type_employee','type_employee.id','employee.type_emp_id')
                ->where('emp_id', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('emp_name', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('emp_surname', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('emp_en_name', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('emp_en_surname', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('emp_nickname', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('dept_name', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('team_name', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('pos_name', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('emp_name', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('emp_name', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('emp_name', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('emp_name', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->orWhere('emp_name', 'like', '%' . $request ->get('searchQuest') . '%' )
                ->get();
                return json_encode( $emp );
        }

    }
    public function desc($id){
        $emp = DB::table('employee')
            ->join('department','employee.dept_id','=','department.id')
            ->join('team','employee.team_id','=','team.id')
            ->join('position','employee.pos_id','=','position.id')
            ->join('bank','employee.bank_id','=','bank.id')
            ->join('type_employee','type_employee.id','employee.type_emp_id')
            ->select('*')
            ->where('employee.id',$id)
            ->first($id);

            $emergency = DB::table('emergency_call')
                ->join('employee','emergency_call.emp_id','=','employee.id')
                ->join('relation','emergency_call.relation_id','=','relation.id')
                ->select('emergency_call.id', 'emergency_call.emp_id', 'emergency_call.e_name', 'emergency_call.e_surname', 'emergency_call.e_nickname', 'emergency_call.e_phone', 'emergency_call.relation_id', 'relation.relation_name')
                ->where ('employee.id','=', $id)
                ->get();


        return view('employee.employee_desc',compact('emp','emergency'));

    }

    public function create_contact($emp_id) {


        $relation = relation::all()->pluck('relation_name', 'id');

        $emp = employee::find($emp_id);

        return view('contact.create_contact',compact('relation','emp'));
    }

    public function store_contact(Request $request)
    {

        $id = $request->emp_id;
        // validate data
        //  $rules = [
        //     'emp_id' => 'required',
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
        //     'type_emp_id' => 'required',
        //     'salary' => 'required',
        // ];

        // $request->validate($rules);
        // $start = date("Y-m-d",strtotime($request->emp_start_work));
        // $start_emp = date("Y-m-d",strtotime($request->emp_start_emp));
        // $birthday = date("Y-m-d",strtotime($request->emp_birthday));

        $contact = new emergency_call;
        $contact->emp_id = $request->emp_id;
        $contact->e_name = $request->e_name;
        $contact->e_surname = $request->e_surname;
        $contact->e_nickname = $request->e_nickname;
        $contact->e_phone = $request->e_phone;
        $contact->relation_id = $request->relation_id;
        $contact->save();

        return redirect()->route('employee.employee_desc',[$id])->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    public function edit_contact(Request $request, $id){
        $emp_id = $request->emp_id;

        $emp = employee::find($emp_id);

        $contact = emergency_call::find($id);

        $relation = relation::all()->pluck('relation_name', 'id');

        // return view('employee.edit_employee',['emp' => $emp , 'dept' => $dept, 'team' => $team, 'pos' => $pos, 'bank' => $bank, 'type_employee' => $type_employee , 'bankID' => $bankID]);
        return view('contact.edit_contact',compact('contact', 'relation', 'emp_id', 'emp'));
    }


    public function update_contact(Request $request, $id){
        $emp_id = $request->emp;
        // validate data
        // $rules = [
        //     'emp_id' => 'required',
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
        //     'comp_e_mail' => 'required',
        //     'type_emp_id' => 'required',
        //     'salary' => 'required',
        // ];

        // $request->validate($rules);

        $contact = emergency_call::find($id);
        $contact->update($request->all());

        $contact->save();
        return redirect()->route('employee.employee_desc',[$emp_id])->with('update', 'ข้อมูลสำเร็จ');
    }
}
