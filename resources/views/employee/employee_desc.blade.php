@extends('layouts.master')
@section('title', 'ข้อมูลพนักงานเพิ่มเติม')
@section('sidebar')
@endsection
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"> </i></a></li>
                        <li class="breadcrumb-item"><a href="/manage"> จัดการข้อมูลพื้นฐาน </a></li>
                        <li class="breadcrumb-item"><a href="/employee"> จัดการข้อมูลพนักงาน </a></li>
                    </ol>
                </nav>
            </div>
            @if (session('status'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-inner - icon"><i class="fa fa-check"></i></span>
                            <span class="alert-inner - text"><strong>Success!</strong> เพิ่มข้อมูลสำเร็จ </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('update'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-inner - icon"><i class="fa fa-check"></i></span>
                            <span class="alert-inner - text"><strong>Success!</strong> แก้ไขข้อมูลสำเร็จ </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('delete'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-inner - icon"><i class="fa fa-check"></i></span>
                            <span class="alert-inner - text"><strong> Success! </strong> ลบข้อมูลสำเร็จ </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
                    <div class="card">
                    <!-- Card header -->
                    <!-- Light table -->
                        <h3 scope="col" class="sort" data-sort="budget">Employee : {{ $emp->emp_name }} {{ $emp->emp_surname }} </h3>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <tbody class="list">
                                    <tr>
                                        <td><h3>รหัสพนักงาน </h3> {{$emp->emp_id}} </td>
                                        <td><h3>ชื่อ-นามสกุล(ภาษาไทย) </h3> {{$emp->emp_name}} &nbsp {{$emp->emp_surname}} </td>
                                        <td><h3>ชื่อ-นามสกุล(ภาษาอังกฤษ) </h3> {{$emp->emp_en_name}} &nbsp {{$emp->emp_en_surname}} </td>
                                    </tr>
                                    <tr>
                                        <td><h3>ชื่อเล่น</h3> {{$emp->emp_nickname}} </td>
                                        <td><h3>เลขบัตรประจำตัว</h3> {{$emp->emp_numberID}} </td>
                                        <td><h3>เบอร์โทร </h3> {{$emp->emp_phone}} </td>
                                    </tr>
                                    <tr>
                                        <td><h3>วันเกิด </h3> {{$emp->emp_birthday}} </td>
                                        <td><h3>วันสมัครงาน </h3> {{$emp->emp_start_work}} </td>
                                        <td><h3>วันบรรจุเป็นพนักงาน </h3> {{$emp->emp_start_emp}} </td>

                                    </tr>
                                    <tr>
                                        <td><h3>แผนก </h3> {{$emp->dept_name}} </td>
                                        <td><h3>ทีม </h3> {{$emp->team_name}} </td>
                                        <td><h3>ตำแหน่ง </h3> {{$emp->pos_name}} </td>
                                    </tr>
                                    <tr>
                                        <td><h3>หมายเลขบัญชี </h3> {{$emp->emp_bankID}} </td>
                                        <td><h3>ชื่อธนาคาร </h3> {{$emp->bank_name}} </td>
                                    </tr>
                                    <tr>
                                        <td><h3>ที่อยู่ </h3> {{$emp->emp_address}} </td>
                                        <td><h3>ที่อยู่ปัจจุบัน </h3> {{$emp->current_address}} </td>
                                    </tr>
                                    <tr>
                                        <td><h3>อีเมล </h3> {{$emp->emp_e_mail}} </td>
                                        <td><h3>อีเมลบริษัท </h3> {{$emp->comp_e_mail}} </td>
                                    </tr>
                                    <tr>
                                        <td><h3> ประเภทพนักงาน </h3> {{$emp->type_name}} </td>
                                        <td><h3> เงินเดือน </h3> {{$emp->salary}} </td>
                                        <td><h3>อื่นๆ </h3> {{$emp->other}} </td>
                                    </tr>
                                    <td></td>
                                    <td>
                                            <a href=" {{ route('employee.edit_employee',$emp_id) }} ">
                                                <button type="button" class="btn-icon-clipboard" data-clipboard-text="collection" title="">
                                                    <div>
                                                        <i class="fa fa-edit"></i>
                                                        <span>แก้ไขข้อมูล</span>
                                                    </div>
                                                </button>
                                            </a>
                                                    <!--<i class="fa fa-edit" href=" {{ route('employee.edit_employee',$emp->id) }} " class="btn btn/sm btn/outline"></i>-->
                                        </td>
                                        <td>
                                            <a href=" {{ route('employee.destroy',$emp_id) }} " onclick="return confirm('คุณต้องการลบพนักงานที่เลือกใช่ไหม?')">
                                                <button type="button" class="btn-icon-clipboard" data-clipboard-text="collection" title="">
                                                    <div>
                                                        <i class="ni ni-fat-delete"></i>
                                                        <span>ลบข้อมูล</span>
                                                    </div>
                                                </button>
                                            </a>
                                            <!--<a href=" {{ route('employee.destroy',$emp->id) }} " class="btn btn/sm btn/outline" onclick="return confirm('คุณต้องการลบพนักงานที่เลือกใช่ไหม?')">
                                                <i class="ni ni-fat-delete"></i>
                                            </a>-->
                                        </td>
                            </table>
                            <table class="table align-items-center table-flush">
                                    <h3>ผู้ติดต่อฉุกเฉิน</h3>
                                    <tr>
                                        <td>
                                            <a href=" {{ route('contact.create',$emp_id) }} ">
                                                <button type="button" class="btn-icon-clipboard" data-clipboard-text="collection" title="">
                                                    <div>
                                                        <i class="fa fa-plus"></i>
                                                        <span>เพิ่มผู้ติดต่อฉุกเฉิน</span>
                                                    </div>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h3>ชื่อ-นามสกุล</h3></td>
                                        <td><h3>ชื่อเล่น</h3></td>
                                        <td><h3>เบอร์โทร</h3></td>
                                        <td><h3>ความสัมพันธ์</h3></td>
                                    </tr>
                                    @foreach($emergency as $emerg)
                                    <tr>
                                        <td class="budget">{{$emerg->e_name}} &nbsp {{$emerg->e_surname}} </td>
                                        <td class="budget">{{$emerg->e_nickname}}</td>
                                        <td class="budget">{{$emerg->e_phone}}</td>
                                        <td class="budget">{{$emerg->relation_name}}</td>
                                        <td>
                                            <a href=" {{ route('contact.edit_contact',$emerg->id ) }} " class="btn btn/sm btn/outline">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href=" {{ route('contact.destroy',$emerg->id) }} " class="btn btn/sm btn/outline" onclick="return confirm('คุณต้องการลบพนักงานที่เลือกใช่ไหม?')">
                                                <i class="ni ni-fat-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col text-left">
                        <a href=" {{ route('employee') }}" class="btn btn-success"> ย้อนกลับ </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
