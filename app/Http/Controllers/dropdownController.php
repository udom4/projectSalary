<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\department;
use App\team;

class dropdownController extends Controller
{
    //

    public function getTeam(Request $request){
        $team = DB::table('team')
        ->where('dept_id',$request->dept_id)
        ->pluck('team_name', 'id');
        return response()->json($team);
    }
}
