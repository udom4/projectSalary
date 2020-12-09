@extends('layouts.master')
@section('title', 'จัดการข้อมูลแผนก')
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
              <li class="breadcrumb-item"><a href="/employee">จัดการข้อมูลแผนก</a></li>
          </ol>
        </nav>
</div>
        <div class="col text-right">
          <a href=" {{ route('department.create') }} " class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a>
        </div>
        @if (session('status'))
        <div class="row">
          <div class="col">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span class="alert-inner - icon"><i class="fa fa-check"></i></span>
              <span class="alert-inner - text"><strong>Success!</strong> #</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        @endif
<!-- Search form -->
<form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
</form>



      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="budget">Department</th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach ($dept as $row)
                <form class="edit" action=" {{ route('department.edit',$row->id) }}" method="POST">
                      {{ csrf_field() }}
                  <tr>
                    <th scope="row">
                        <a href="  ">
                        {{$row->dept_name}}
                        </a>
                    </th>
                    <td>
                      <a href="{{ route('department.edit',$row->id) }} " class="btn btn/sm btn/outline">
                         <i class="fa fa-edit"></i>
                         </a>
                      <a href="{{ route('department.destroy',$row->id) }} " class="btn btn/sm btn/outline" onclick="return confirm('คุณต้องการลบผู้ปฎิบัติงานที่เลือกใช่ไหม?')">
                         <i class="ni ni-fat-delete"></i>
                         </a>
                    </td>
                </form>
                    
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" role="menu">
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
