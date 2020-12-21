@extends('layouts.master')
@section('title', 'เพิ่มข้อมูลพนักงาน')
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
                        <li class="breadcrumb-item"><a href="#">เพิ่มข้อมูลผู้ติดต่อ</a></li>
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
                                    <h3 class="mb-0">เพิ่มข้อมูลผู้ติดต่อ</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0" style="min-height: 50vh">
                            {!! Form::open(['url' => route('contact.store')  ,'file'=>true]) !!}
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('emp_id', 'ID'); !!}
                                            {!! Form::text('emp_id', null,
                                                ['class' => 'form-control',($errors->has('emp_id') ? 'is-invalid' : '') ,]); !!}
                                            {!! $errors->first('emp_id', '<p class="text-red">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('name', 'name(Thai)'); !!}
                                            {!! Form::text('e_name', null,
                                                ['class' => 'form-control',($errors->has('e_name') ? 'is-invalid' : '') ,]); !!}
                                            {!! $errors->first('e_name', '<p class="text-red">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('surname', 'surname(Thai)'); !!}
                                            {!! Form::text('e_surname', null,
                                                ['class' => 'form-control',($errors->has('e_surname') ? 'is-invalid' : '') ,]); !!}
                                            {!! $errors->first('e_surname', '<p class="text-red">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('nickname', 'nickname'); !!}
                                            {!! Form::text('e_nickname', null,
                                                ['class' => 'form-control',($errors->has('nickname') ? 'is-invalid' : '') ,]); !!}
                                            {!! $errors->first('nickname', '<p class="text-red">:message</p>') !!}
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('phone', 'Phone'); !!}
                                            {!! Form::text('e_phone', null,
                                                ['class' => 'form-control',($errors->has('e_phone') ? 'is-invalid' : '') ,]); !!}
                                            {!! $errors->first('e_phone', '<p class="text-red">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('relation', 'relation'); !!}
                                            {!! Form::text('relation_id', null,
                                                ['class' => 'form-control',($errors->has('address') ? 'is-invalid' : '') ,]); !!}
                                            {!! $errors->first('address', '<p class="text-red">:message</p>') !!}
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
@endsection

