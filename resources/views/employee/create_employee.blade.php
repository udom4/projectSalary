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
                        <li class="breadcrumb-item"><a href="{{ route('department.department') }}">จัดการข้อมูลพนักงาน</a></li>
                        <li class="breadcrumb-item"><a href="#">เพิ่มข้อมูลพนักงาน</a></li>
                    </ol>
                </nav>
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

            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">เพิ่มข้อมูลพนักงาน</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0" style="min-height: 50vh">
                            {!! Form::open(['url' =>''  ,'file'=>true]) !!}
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('name', 'name(Thai)'); !!}
                                            {!! Form::text('emp_name', null, 
                                                ['class' => 'form-control',($errors->has('emp_name') ? 'is-invalid' : '') ,]); !!}
                                            {!! $errors->first('emp_name', '<p class="text-red">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('surname', 'surname(Thai)'); !!}
                                            {!! Form::text('emp_surname', null, 
                                                ['class' => 'form-control',($errors->has('emp_surname') ? 'is-invalid' : '') ,]); !!}
                                            {!! $errors->first('emp_surname', '<p class="text-red">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('en_name', 'name'); !!}
                                            {!! Form::text('emp_en_name', null, 
                                                ['class' => 'form-control',($errors->has('emp_surname') ? 'is-invalid' : '') ,]); !!}
                                            {!! $errors->first('emp_surname', '<p class="text-red">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('en_surname', 'surname'); !!}
                                            {!! Form::text('emp_en_surname', null, 
                                                ['class' => 'form-control',($errors->has('emp_en_surname') ? 'is-invalid' : '') ,]); !!}
                                            {!! $errors->first('emp_en_surname', '<p class="text-red">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('nickname', 'nickname'); !!}
                                            {!! Form::text('emp_nickname', null, 
                                                ['class' => 'form-control',($errors->has('nickname') ? 'is-invalid' : '') ,]); !!}
                                            {!! $errors->first('nickname', '<p class="text-red">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('start', 'start work'); !!}
                                            {!! Form::text('emp_start_work', '', array('id' => 'datepicker'), ); !!}                         
                                        </div>
                                        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                                        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
                                        <script>
                                            $(function() {
                                                $( "#datepicker" ).datepicker({
                                                
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>        
                                <div class="row">
                                <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('start_emp', 'start employee'); !!}
                                            {!! Form::text('emp_start_emp', '', array('id' => 'datepicker1'), ); !!}                         
                                        </div>
                                        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                                        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
                                        <script>
                                            $(function() {
                                                $( "#datepicker1" ).datepicker({
                                                
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('de_id', 'select department'); !!}
                                            {!! Form::select('dept_name', $dept ,'-- select department --',
                                            ['class' => 'form-control'], ['id' => 'dept']); !!}
                                        </div>
                                    </div>
                                </div>        
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                        {{ csrf_field() }}
                                            {!! Form::label('te_id', 'team'); !!}
                                            {!! Form::select('team_id', $team ,null,
                                            ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                </div>    
                                <div class="row mt-2">
                                    <div class="col">
                                        {!! Form::submit('บันทึก', ['class' => 'btn btn-primary']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script>
         $(document).ready(function() {
        $('#dept').on('change', function() {
            var dept_ID = $(this).val();
            if(dept_ID) {
                $.ajax({
                    url: '/findTeamID/'+dept_ID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        //console.log(data);
                        $team_ = $team
                    });
                  }else{
                    
                  }
                  }
                });
            }else{
              
            }
        });
    });
    </script>
@endsection

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">