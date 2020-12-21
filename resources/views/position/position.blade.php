@extends('layouts.master')
@section('title', 'จัดการข้อมูลตำแหน่ง')
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
                        <li class="breadcrumb-item"><a href="">จัดการข้อมูลตำแหน่ง</a></li>
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
                                    <input type="text"  id="search-pos" class="form-control" placeholder="Search Position....">
                                </div>
                            </div>
                            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </form>
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
                                    <tbody class="list" id="dynamic-row">
                                        @foreach ($position as $row)
                                            <form class="edit" action=" {{ route('team.destroy',$row->id) }} " method="POST">
                                                {{ csrf_field() }}
                                                <tr>
                                                    <th scope="row">
                                                            {{$row->pos_name}}
                                                    </th>
                                                    <td>
                                                        <a href=" {{ route('position.edit_position',$row->id) }} " class="btn btn/sm btn/outline">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href=" {{ route('position.destroy',$row->id) }} " class="btn btn/sm btn/outline" onclick="return confirm('คุณต้องการลบตำแหน่งที่เลือกใช่ไหม?')">
                                                            <i class="ni ni-fat-delete"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                    <script type="text/javascript">
                                        $('body').on('keyup','#search-pos', function(){
                                            var searchQuest = $(this).val();
                                            $.ajax({
                                                method: 'POST',
                                                url: '{{ route("search-pos") }}',
                                                dataType: 'json',
                                                data: {
                                                    '_token' : '{{ csrf_token() }}',
                                                    searchQuest: searchQuest,
                                                    team_id: {{ $team->id }},
                                                },
                                                success: function(res){
                                                    var tableRow = res.length;
                                                    $('#dynamic-row').html('');
                                                    for(var i=0; i<tableRow; i++){

                                                        var pos_id = res[i].id;
                                                        var name = res[i].pos_name;
                                                        var tr_str = "<tr>"+
                                                                "<th>"+"<a href='/position"+pos_id+"'>"+name+"</a></th>"+
                                                                "<td>"+"<a href='/edit_position"+pos_id+"' class='btn btn/sm btn/outline'>"+"<i class='fa fa-edit'></i></a>"+
                                                                "<a href='/deletePosition"+pos_id+"' class='btn btn/sm btn/outline'>"+"<i class='ni ni-fat-delete'></i></a></td>"
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
                    <div class="col text-left">
                        <a href=" {{ route('team',$team->dept_id) }}" class="btn btn-success"> ย้อนกลับ </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
