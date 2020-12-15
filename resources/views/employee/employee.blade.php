@extends('layouts.master')
@section('title', 'จัดการข้อมูลพนักงาน')
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
        <div class="col text-right">
          <a href=" {{ route('employee.create') }} " class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a>
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
        <div class="row">
          <div class="col">
            <div class="card">
                <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text"  id="search-emp" class="form-control" placeholder="Search department....">
                        </div>
                    </div>
                    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </form>
            <div class="card">
              <!-- Card header -->
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Name (Thai)</th>
                      <th scope="col" class="sort" data-sort="name">Name</th>
                      <th scope="col" class="sort" data-sort="name">Nickname</th>
                      <th scope="col" class="sort" data-sort="name">Department</th>
                      <th scope="col" class="sort" data-sort="name">Tel.Number</th>
                      <th scope="col" class="sort" data-sort="name">Salary</th>
                      <th scope="col" class="sort" data-sort="name">Other</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($emp as $row)
                      <tr>
                        <th scope="row">
                          <a href="#">
                            {{$row->id}}
                          </a>
                        </th>
                        <td class="budget">{{$row->emp_name}} &nbsp {{$row->emp_surname}}</td>
                        <td class="budget">{{$row->emp_en_name}} &nbsp {{$row->emp_en_surname}}</td>
                        <td class="budget">{{$row->emp_nickname}}</td>
                        <td class="budget">{{$row->dept_name}}</td>
                        <td class="budget">{{$row->emp_phone}}</td>
                        <td class="budget">{{$row->salary}}</td>
                        <td class="budget">{{$row->other}}</td>
                        <td class="text-right">
                        <td>
                            <a href=" {{ route('employee.edit_employee',$row->id) }} " class="btn btn/sm btn/outline">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href=" {{ route('employee.destroy',$row->id) }} " class="btn btn/sm btn/outline" onclick="return confirm('คุณต้องการลบพนักงานที่เลือกใช่ไหม?')">
                                <i class="ni ni-fat-delete"></i>
                            </a>
                        </td>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </div>
                </div>

@endsection
