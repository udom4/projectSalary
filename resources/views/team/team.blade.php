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
                <a href=" {{ route('team.create', $dept->id) }} " class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a>
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
                                    <input type="text"  id="search-team" class="form-control" placeholder="Search team....">
                                </div>
                            </div>
                            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </form>
                        <!-- Card header -->
                        <!-- Light table -->
                        <h3 scope="col" class="sort" data-sort="budget">Department : {{ $dept->dept_name }} </h3>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="budget">team_name </th>
                                        </tr>
                                    </thead>
                                    <tbody id="dynamic-row" class="list">
                                        @foreach ($team as $row)

                                            <form class="edit" action=" {{ route('team.destroy',$row->id) }} " method="POST">
                                                {{ csrf_field() }}
                                                <tr>
                                                    <th scope="row">
                                                        <a href=" {{ route('position', $row->id) }} ">
                                                            {{$row->team_name}}
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
                                    <script type="text/javascript">
                                        $('body').on('keyup','#search-team', function(){
                                            var searchQuest = $(this).val();
                                            $.ajax({
                                                method: 'POST',
                                                url: '{{ route("search-team") }}',
                                                dataType: 'json',
                                                data: {
                                                    '_token' : '{{ csrf_token() }}',
                                                    searchQuest: searchQuest,
                                                    dept_id: {{ $dept->id }},
                                                },
                                                success: function(res){

                                                    var tableRow = res.length;
                                                    $('#dynamic-row').html('');
                                                    for(var i=0; i<tableRow; i++){

                                                        var team_id = res[i].id;
                                                        var name = res[i].team_name;
                                                        var tr_str = "<tr>"+
                                                                "<th>"+"<a href='/team"+team_id+"'>"+name+"</a></th>"+
                                                                "<td>"+"<a href='/edit_team"+team_id+"' class='btn btn/sm btn/outline'>"+"<i class='fa fa-edit'></i></a>"+
                                                                "<a href='/deleteTeam"+team_id+"' class='btn btn/sm btn/outline'>"+"<i class='ni ni-fat-delete'></i></a></td>"
                                                                +"</tr>"
                                                        $('#dynamic-row').append(tr_str);
                                                        //console.log(tr_str)
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

