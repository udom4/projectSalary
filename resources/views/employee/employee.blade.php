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
                                <tbody class="list" id="dynamic-row">
                                    @foreach ($emp as $row)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">{{$row->emp_id}}</a>
                                        </th>
                                        <td class="budget">{{$row->emp_name}} &nbsp {{$row->emp_surname}}</td>
                                        <td class="budget">{{$row->emp_en_name}} &nbsp {{$row->emp_en_surname}}</td>
                                        <td class="budget">{{$row->emp_nickname}}</td>
                                        <td class="budget">{{$row->dept_name}}</td>
                                        <td class="budget">{{$row->team_name}}</td>
                                        <td class="budget">{{$row->pos_name}}</td>
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
                                    </tr>
                                    @endforeach
                                </tbody>
                                <script type="text/javascript">
                                    $('body').on('keyup','#search-emp', function(){
                                        var searchQuest = $(this).val();
                                        $.ajax({
                                            method: 'POST',
                                            url: '{{ route("search-emp") }}',
                                            dataType: 'json',
                                            data: {
                                                '_token' : '{{ csrf_token() }}',
                                                searchQuest: searchQuest,
                                            },
                                            success: function(res){
                                                var tableRow = res.length;
                                                $('#dynamic-row').html('');
                                                for(var i=0; i<tableRow; i++){

                                                    var emp_id = res[i].emp_id;
                                                    var name = res[i].emp_name;
                                                    var surname = res[i].emp_surname;
                                                    var en_name = res[i].emp_en_name;
                                                    var en_surname = res[i].emp_en_surname;
                                                    var nickname = res[i].emp_nickname;
                                                    //var start_work = res[i].emp_start_work;
                                                    //var start_emp = res[i].emp_start_emp;
                                                    var dept_name = res[i].dept_name;
                                                    var team_name = res[i].team_name;
                                                    var pos_name = res[i].pos_name;
                                                    //var birthday = res[i].birthday;
                                                    //var numberID = res[i].numberID;
                                                    //var bank_numberID = res[i].bank_numberID;
                                                    //var bank = res[i].bank_name;
                                                    var phone = res[i].emp_phone;
                                                    //var address = res[i].emp_address;
                                                    //var current_address = res[i].current_address;
                                                    //var email = res[i].emp_e_mail;
                                                    //var comp_mail = res[i].comp_e_mail;
                                                    //var type_employee = res[i].type_emp_id;
                                                    var salary = res[i].salary;
                                                    var other = res[i].other;

                                                    var tr_str = "<tr>"+
                                                        "<th scope='row'>"+"<a href=''>"+ emp_id +"</a></th>"+
                                                        "<td class='budget'>"+ name +"&nbsp"+ surname +"</td>"+
                                                        "<td class='budget'>"+ en_name +"&nbsp"+ en_surname +"</td>"+
                                                        "<td class='budget'>"+ nickname +"</td>"+
                                                        "<td class='budget'>"+ dept_name +"</td>"+
                                                        "<td class='budget'>"+ team_name +"</td>"+
                                                        "<td class='budget'>"+ pos_name +"</td>"+
                                                        "<td class='budget'>"+ phone +"</td>"+
                                                        "<td class='budget'>"+ salary +"</td>"+
                                                        "<td class='budget'>"+ other +"</td></tr>"
                                                    $('#dynamic-row').append(tr_str);
                                                    console.log(tr_str)
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
