<?php

namespace App\Http\Controllers;
use DB;
use App\department;
use App\position;
use App\team;
use Illumminate\Support\Collection;

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


        //validate data
        $rules = [
            'dept_name' => 'required',
        ];

        $request->validate($rules);


        $dept = new department;
        $dept->dept_name = $request->dept_name;
        $dept->save();

        return redirect()->route('department.department')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    public function edit($id)
    {
        $dept = department::find($id);
        return view('department.edit')
            ->with('dept',$dept);
    }

    public function update(Request $request, $id)
    {
        //validate data
        $rules = [
            'dept_name' => 'required',
        ];

        $request->validate($rules);

        $dept = department::find($id);
        $dept->update($request->all());

        $dept->save();
        return redirect()->route('department.department')->with('update', 'ข้อมูลสำเร็จ');
    }


    public function destroy($id)
    {
        $dept = department::find($id);
        $dept->delete();
        return redirect()->route('department.department')->with('delete', 'ลบข้อมูลสำเร็จ');
    }

    public function searchDept(Request $request)
    {
        if(empty($request)){

            $dept = DB::table('department')
                ->select('*')
                ->get();
                return json_encode( $dept );

        }
        
        if(isset($request)){
                $dept = department::where('dept_name', 'like', '%' . $request ->get('searchQuest') . '%' )->get();
                return json_encode( $dept );
        }
        
        //$search_text = $_GET['query'];
        //$emp = DB::table('depaetment')
            //->join('team','depaetment._id','=','team.dept_id')
        //    ->where('dept_name','LIKE','%'.$search_text.'%')
        //    ->get();

        //$employ = $emp;
        //return view('department.department',compact('emp','employ'));
    }
}
