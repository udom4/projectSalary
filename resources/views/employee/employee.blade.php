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
            

      <div class="row">
        <div class="col">
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
                    <th scope="col" class="sort" data-sort="name">Team</th>
                    <th scope="col" class="sort" data-sort="name">Position</th>
                    <th scope="col" class="sort" data-sort="name">BankId</th>
                    <th scope="col" class="sort" data-sort="name">BankName</th>
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
                        {{$row->emp_id}}
                        </a>
                    </th>
                    <td class="budget">{{$row->emp_name}} &nbsp {{$row->emp_surname}}</td>
                    <td class="budget">{{$row->emp_en_name}} &nbsp {{$row->emp_en_surname}}</td>
                    <td class="budget">{{$row->emp_nickname}}</td>
                    <td class="budget">{{$row->de_name}}</td>
                    <td class="budget">{{$row->team_name}}</td>
                    <td class="budget">{{$row->pos_name}}</td>
                    <td class="budget">{{$row->emp_bankID}}</td>
                    <td class="budget">{{$row->bank_name}}</td>
                    <td class="budget">{{$row->emp_phone}}</td>
                    <td class="budget">{{$row->salary}}</td>
                    <td class="budget">{{$row->other}}</td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach

                </div>
                </div>

@endsection
