<?php

namespace App\Http\Controllers;
use DB;
use App\team;
use App\department;

use Illuminate\Http\Request;

class teamController extends Controller
{
    //
    public function info($id){
        $dept = department::find($id);
        
        $team = DB::table('team')
        ->select('*')
        ->where('team.dept_id','=', $id)
        ->get();

        return view('department.team',compact('dept','team'));
    }

    public function create($dept_id) {
        $dept = department::find($dept_id);

        $team = DB::table('team')
        ->select('*')
        ->get();

        return view('department.create_team',compact('dept', 'team'));
    }

    //insert
    public function store(Request $request)
    {
            
        $id = $request->dept_id;
        //validate data
        $rules = [
            'team_name' => 'required',
            
        ];

        $request->validate($rules);


        $team = new team;
        $team->team_name = $request->team_name;
        $team->dept_id = $request->dept_id;
        $team->save();

        return redirect()->route('department.team',[$id])->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    //delete
    public function destroy($id)
    {
        $team = team::find($id);
        $team->delete();
        return back()->with('status', 'ลบข้อมูลสำเร็จ');
    }
}