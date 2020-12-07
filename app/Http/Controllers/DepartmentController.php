<?php

namespace App\Http\Controllers;
use DB;
use App\department;
use App\position;
use App\team;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function info() {
        $dept = DB::table('department')
        ->select('*')
        ->get();

        return view('department.department',compact('dept'));

    }
}
