@extends('layouts.master')
@section('title', 'จัดการข้อมูลทีม')
@section('sidebar')
@endsection
@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('manage') }}">จัดการข้อมูลพื้นฐาน</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('department.department') }}">จัดการข้อมูลแผนก</a></li>
                        <li class="breadcrumb-item"><a href="">จัดการข้อมูลทีม</a></li>
                    </ol>
                </nav>
            </div>
        
            <div class="col text-right">
                <a href=" {{ route('position.create', $team->id) }} " class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a>
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
                        <h3 scope="col" class="sort" data-sort="budget">Team : {{ $team->team_name }} </h3>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="budget">position name </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($position as $row)
                                            <form class="edit" action=" {{ route('team.destroy',$row->id) }} " method="POST">
                                                {{ csrf_field() }}
                                                <tr>
                                                    <th scope="row">
                                                        <a href=" {{ route('home') }} ">
                                                            {{$row->pos_name}}
                                                        </a>
                                                    </th>
                                                    <td>
                                                        <a href=" {{ route('team.edit_team',$row->id) }} " class="btn btn/sm btn/outline">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href=" {{ route('team.destroy',$row->id) }} " class="btn btn/sm btn/outline" onclick="return confirm('คุณต้องการลบทีมที่เลือกใช่ไหม?')">
                                                            <i class="ni ni-fat-delete"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
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