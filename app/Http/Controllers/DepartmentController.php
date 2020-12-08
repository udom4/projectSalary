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

    public function create() {
        $dept = DB::table('department')
        ->select('*')
        ->get();

        return view('department.create',compact('dept'));
    }

    public function store(Request $request)
    {
        $dept = new department;
        $dept->dept_name = $request->dept_name;
        $dept->save();

        return redirect()->route('department.department')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }
  
}
