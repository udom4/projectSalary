@extends('layouts.master')
@section('title', 'แก้ไขข้อมูลตำแหน่ง')
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
              <li class="breadcrumb-item"><a href="#">แก้ไขข้อมูลตำแหน่ง</a></li>
            </ol>
          </nav>
        </div>

        <div class="row">
          <div class="col">
            <div class="card shadow">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">แก้ไขข้อมูลตำแหน่ง  {{$position->pos_name}}</h3>
                  </div>
                </div>
              </div>


              {!! Form::model($position, ['url' => route('position.update', $position->id) ,'method'=> 'post']) !!}
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      {!! Form::hidden('team_id', $position->team_id , ['class' => 'form-control']);!!}
                      {!! Form::label('name', 'position name'); !!}
                      {!! Form::text('pos_name', null,
                        ['class' => 'form-control',($errors->has('pos_name') ? 'is-invalid' : '') ,]); !!}
                        {!! $errors->first('pos_name', '<p class="text-red">:message</p>') !!}
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    {!! Form::submit('บันทึก', ['class' => 'btn btn-primary']) !!}
                    <a href=" {{ route('team',$position->team_id) }} " class="btn btn-success"> ย้อนกลับ </a>
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
