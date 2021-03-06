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
              <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('manage') }}">จัดการข้อมูลพื้นฐาน</a></li>
              <li class="breadcrumb-item"><a href="{{ route('department.department') }}">จัดการข้อมูลแผนก</a></li>
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

<!-- Search form -->
    <div class="row">
        <div class="col">
            <div class="card" id="Dept">
                <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text"  id="search-dept" class="form-control" placeholder="Search department....">
                        </div>
                    </div>
                    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </form>
                <!-- Card header -->
                <!-- Light table -->
                <div class="table-responsive" >
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="budget">Department</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="dynamic-row">
                            @foreach ($dept as $row)
                                <form class="edit" action=" {{ route('department.edit',$row->id) }}" method="POST">
                                    {{ csrf_field() }}
                                <tr>
                                    <th scope="row">
                                        <a href="{{ route('team',$row->id) }} ">
                                            {{$row->dept_name}}
                                        </a>
                                    </th>
                                    <td>
                                        <a href="{{ route('department.edit',$row->id) }} " class="btn btn/sm btn/outline">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('department.destroy',$row->id) }} " class="btn btn/sm btn/outline" onclick="return confirm('คุณต้องการลบแผนกงานที่เลือกใช่ไหม?')">
                                            <i class="ni ni-fat-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                </form>
                            @endforeach
                        </tbody>
                        <script type="text/javascript">
                            $('body').on('keyup','#search-dept', function(){
                                var searchQuest = $(this).val();
                                $.ajax({
                                    method: 'POST',
                                    url: '{{ route("search-dept") }}',
                                    dataType: 'json',
                                    data: {
                                        '_token' : '{{ csrf_token() }}',
                                        searchQuest: searchQuest,
                                    },
                                    success: function(res){
                                        var tableRow = res.length;
                                        $('#dynamic-row').html('');
                                        for(var i=0; i<tableRow; i++){

                                            var dept_id = res[i].id;
                                            var name = res[i].dept_name;
                                            var tr_str = "<tr>"+
                                                    "<th>"+"<a href='/team"+dept_id+"'>"+name+"</a></th>"+
                                                    "<td>"+"<a href='/edit"+dept_id+"' class='btn btn/sm btn/outline'>"+"<i class='fa fa-edit'></i></a>"+
                                                    "<a href='/deleteDepartment"+dept_id+"' class='btn btn/sm btn/outline'>"+"<i class='ni ni-fat-delete'></i></a></td>"
                                                    +"</tr>"
                                            $('#dynamic-row').append(tr_str);

                                            //$.redirect()->route('team',[dept_id]);

                                            //$.each(res, function(index, value){
                                            //    tableRow = ' <tr><td scope="row">'+value.dept_name+'</td></tr> '
                                            //});
                                            //$('#dynamic-row').append(tableRow);
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
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
