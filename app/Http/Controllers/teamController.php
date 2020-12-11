<?php

namespace App\Http\Controllers;
use DB;
use App\team;
use App\department;
use Illumminate\Support\Collection;

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

        return view('team.team',compact('dept','team'));
    }

    public function create($dept_id) {
        $dept = department::find($dept_id);

        $team = DB::table('team')
        ->select('*')
        ->get();

        return view('team.create_team',compact('dept', 'team'));
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

        return redirect()->route('team',[$id])->with('status', 'บันทึกข้อมูลสำเร็จ');
    }


    public function edit_team($id)
    {
        $team = team::find($id);
        return view('team.edit_team')
        ->with('team',$team);
    }

    //update
    public function update_team(Request $request, $id)
    {

        $dept_id = $request->dept_id;
        //validate data
        $rules = [
            'team_name' => 'required',
        ];

        $request->validate($rules);

        $team = team::find($id);
        $team->update($request->all());

        $team->save();
        return redirect()->route('team',[$dept_id])->with('update', 'ข้อมูลสำเร็จ');
    }

    //delete
    public function destroy($id)
    {
        $team = team::find($id);
        $team->delete();
        return back()->with('delete', 'ลบข้อมูลสำเร็จ');
    }

    public function searchTeam(Request $request){
        if(empty($request)){

            $team = DB::table('team')
                ->select('*')
                ->get();
                return json_encode( $team );

        }

        if(isset($request)){
                $team = team::where('team_name', 'like', '%' . $request ->get('searchQuest') . '%' )->get();
                return json_encode( $team );
        }
    }
}
