@extends('layouts.master')
@section('title', 'แก้ไขข้อมูลแผนก')
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
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </nav>
        </div>

        <div class="row">
          <div class="col">
            <div class="card shadow">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0"> เพิ่มข้อมูลผู้ติดต่อฉุกเฉิน </h3>
                  </div>
                </div>
              </div>


              <div class="card-body pt-0" style="min-height: 50vh">
                {!! Form::open(['url' => route('emergency.store') ,'file'=>true]) !!}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('name', 'Emergency '); !!}
                            {!! Form::text('e_name', null,
                                ['class' => 'form-control',($errors->has('e_name') ? 'is-invalid' : '') ,]); !!}
                            {!! $errors->first('dept_name', '<p class="text-red">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('name', 'Emergency name'); !!}
                            {!! Form::text('e_name', null,
                                ['class' => 'form-control',($errors->has('e_name') ? 'is-invalid' : '') ,]); !!}
                            {!! $errors->first('e_name', '<p class="text-red">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('name', 'Emergency surname'); !!}
                            {!! Form::text('e_surname', null,
                                ['class' => 'form-control',($errors->has('e_surname') ? 'is-invalid' : '') ,]); !!}
                            {!! $errors->first('e_surname', '<p class="text-red">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('name', 'Emergency nickname'); !!}
                            {!! Form::text('e_name', null,
                                ['class' => 'form-control',($errors->has('e_name') ? 'is-invalid' : '') ,]); !!}
                            {!! $errors->first('dept_name', '<p class="text-red">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('name', 'Emergency phone'); !!}
                            {!! Form::text('e_name', null,
                                ['class' => 'form-control',($errors->has('e_name') ? 'is-invalid' : '') ,]); !!}
                            {!! $errors->first('dept_name', '<p class="text-red">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('name', 'Emergency relation'); !!}
                            {!! Form::text('e_name', null,
                                ['class' => 'form-control',($errors->has('e_name') ? 'is-invalid' : '') ,]); !!}
                            {!! $errors->first('dept_name', '<p class="text-red">:message</p>') !!}
                        </div>
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
@endsection
