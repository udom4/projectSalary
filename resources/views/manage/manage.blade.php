@extends('layouts.master')
@section('title', 'จัดการข้อมูลพื้นฐาน')
@section('sidebar')
@endsection
@section('content')
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">จัดการข้อมูลพื้นฐาน</a></li>
                </ol>
              </nav>
            </div>
</div>
<div class="col-lg-3 col-md-6">
  <button type="button" class="btn-icon-clipboard" data-clipboard-text="single-02" title="จัดข้อมูลพนักงาน">
    <div>
      <i class="ni ni-single-02"></i>
      <span>จัดการข้อมูลพนักงาน</span>
    </div>
  </button>
  <button type="button" class="btn-icon-clipboard" data-clipboard-text="collection" title="จัดการข้อมูลแผนก">
    <div>
      <i class="ni ni-collection"></i>
      <span>จัดการข้อมูลแผนก</span>
    </div>
  </button>
</div>

@endsection
