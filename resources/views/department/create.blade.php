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
              <li class="breadcrumb-item"><a href="#">เพิ่มข้อมูลแผนก</a></li>
          </ol>
        </nav>
</div>

<div class="row">
 <div class="col">
 <div class="card shadow">
 <div class="card-header border-0">
 <div class="row align-items-center">
 <div class="col">
 <h3 class="mb-0">เพิ่มข้อมูลสินค้า</h3>
 </div>
 </div>
 </div>
 <div class="card-body pt-0" style="min-height: 50vh">
 {!! Form::open(['url' => route('department.store') ,'file'=>true]) !!}
 <div class="row">
 <div class="col">
 <div class="form-group">
 {!! Form::label('name', 'department name'); !!}
 {!! Form::text('dept_name', null, ['class' => 'form-control']); !!}
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
@endsection