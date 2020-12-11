<?php

namespace App\Http\Controllers;
use DB;
use App\team;
use App\position;

use Illuminate\Http\Request;

class positionController extends Controller
{
    //

    public function info($id){
        $team = team::find($id);
        
        $position = DB::table('position')
        ->select('*')
        ->where('position.team_id','=', $id)
        ->get();

        return view('position.position',compact('position','team'));
    }

    public function create($team_id) {
        $team = team::find($team_id);

        $position = DB::table('position')
        ->select('*')
        ->get();

        return view('position.create_position',compact('position', 'team'));
    }

     //insert
     public function store(Request $request)
     {
             
         $id = $request->team_id;
         //validate data
         $rules = [
             'pos_name' => 'required',
             
         ];
 
         $request->validate($rules);
 
 
         $position = new position;
         $position->pos_name = $request->pos_name;
         $position->team_id = $request->team_id;
         $position->salary_rate = '1';
         $position->save();
 
         return redirect()->route('position',[$id])->with('status', 'บันทึกข้อมูลสำเร็จ');
     }
}
