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


     public function edit_position($id)
    {
        $position = position::find($id);
        return view('position.edit_position')
        ->with('position',$position);
    }

    //update
    public function update_position(Request $request, $id)
    {

        $team_id = $request->team_id;
        //validate data
        $rules = [
            'pos_name' => 'required',
        ];

        $request->validate($rules);

        $position = position::find($id);
        $position->update($request->all());

        $position->save();
        return redirect()->route('position',[$team_id])->with('update', 'ข้อมูลสำเร็จ');
    }

    //delete
    public function destroy($id)
    {
        $position = position::find($id);
        $position->delete();
        return back()->with('delete', 'ลบข้อมูลสำเร็จ');
    }

    public function searchPosition(Request $request){
        if(empty($request)){

            $position = DB::table('position')
                ->select('*')
                ->get();
                return json_encode( $position );

        }

        if(isset($request)){
                $position = position::where('pos_name', 'like', '%' . $request ->get('searchQuest') . '%' )->get();
                return json_encode( $position );
        }
    }
}
