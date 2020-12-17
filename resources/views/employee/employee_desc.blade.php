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
                        <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/manage">จัดการข้อมูลพื้นฐาน</a></li>
                        <li class="breadcrumb-item"><a href="/employee">จัดการข้อมูลพนักงาน</a></li>
                    </ol>
                </nav>
            </div>
            @if (session('status'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-inner - icon"><i class="fa fa-check"></i></span>
                            <span class="alert-inner - text"><strong>Success!</strong> เพิ่มข้อมูลสำเร็จ</span>
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
                            <span class="alert-inner - text"><strong>Success!</strong> แก้ไขข้อมูลสำเร็จ</span>
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
                            <span class="alert-inner - text"><strong>Success!</strong> ลบข้อมูลสำเร็จ</span>
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
                        <h3 scope="col" class="sort" data-sort="budget">Employee : {{ $emp->emp_name }} {{ $emp->emp_surname }}</h3>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <tbody class="list">
                                    <tr>
                                        <td><h3>id </h3> {{$emp->emp_id}}</td>
                                        <td><h3>name-surname(thai) </h3> {{$emp->emp_name}} &nbsp {{$emp->emp_surname}}</td>
                                        <td><h3>name-surname(eng) </h3> {{$emp->emp_en_name}} &nbsp {{$emp->emp_en_surname}}</td>
                                    </tr>
                                    <tr>
                                        <td><h3>nickname </h3> {{$emp->emp_nickname}}</td>
                                        <td><h3>id card </h3> {{$emp->emp_numberID}}</td>
                                        <td><h3>tel. </h3> {{$emp->emp_phone}}</td>
                                    </tr>
                                    <tr>
                                        <td><h3>birthday </h3> {{$emp->emp_birthday}}</td>
                                        <td><h3>start emp </h3> {{$emp->emp_start_emp}}</td>
                                        <td><h3>start work </h3> {{$emp->emp_start_work}}</td>
                                    </tr>
                                    <tr>
                                        <td><h3>department </h3> {{$emp->dept_name}}</td>
                                        <td><h3>team </h3> {{$emp->team_name}}</td>
                                        <td><h3>position </h3> {{$emp->pos_name}}</td>
                                    </tr>
                                    <tr>
                                        <td><h3>bank id </h3> {{$emp->emp_bankID}}</td>
                                        <td><h3>bank name </h3> {{$emp->bank_name}}</td>
                                    </tr>
                                    <tr>
                                        <td><h3>address </h3> {{$emp->emp_address}}</td>
                                        <td><h3>current address </h3> {{$emp->current_address}}</td>
                                    </tr>
                                    <tr>
                                        <td><h3>email </h3>{{$emp->emp_e_mail}}</td>
                                        <td><h3>company email </h3>{{$emp->comp_e_mail}}</td>
                                    </tr>
                                    <tr>
                                        <td><h3> type employee </h3> {{$emp->type_name}}</td>
                                        <td><h3> salary </h3> {{$emp->salary}} </td>
                                        <td><h3>other </h3> {{$emp->other}} </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href=" {{ route('employee.edit_employee',$emp->id) }} ">
                                                <button type="button" class="btn-icon-clipboard" data-clipboard-text="collection" title="">
                                                    <div>
                                                        <i class="fa fa-plus"></i>
                                                        <span>เพิ่มผู้ติดต่อฉุกเฉิน</span>
                                                    </div>
                                                </button>
                                            </a></td>
                                        <td>
                                            <a href=" {{ route('employee.edit_employee',$emp->id) }} ">
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
                                            <a href=" {{ route('employee.destroy',$emp->id) }} " onclick="return confirm('คุณต้องการลบพนักงานที่เลือกใช่ไหม?')">
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
