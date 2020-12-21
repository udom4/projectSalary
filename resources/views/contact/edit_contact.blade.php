@extends('layouts.master')
@section('title', 'แก้ไขข้อมูลพนักงาน')
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
                        <li class="breadcrumb-item"><a href="{{ route('employee') }}">จัดการข้อมูลพนักงาน</a></li>
                        <li class="breadcrumb-item"><a href="#">แก้ไขข้อมูลพนักงาน</a></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">แก้ไขข้อมูลพนักงาน : </h3>
                                </div>
                            </div>
                        </div>

                        {!! Form::model($contact, ['url' => route('contact.update', $contact->id) ,'method'=> 'post']) !!}
                        <div class="row">
                                <tr>
                                    <td>
                                        <div class="col">
                                            <div class="form-group">
                                                {!! Form::hidden('emp', $contact->emp_id , ['class' => 'form-control']);!!}
                                                {!! Form::label('name', 'name(Thai)'); !!}
                                                {!! Form::text('e_name', null,
                                                    ['class' => 'form-control',($errors->has('e_name') ? 'is-invalid' : '') ,]); !!}
                                                {!! $errors->first('e_name', '<p class="text-red">:message</p>') !!}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col">
                                            <div class="form-group">
                                                {!! Form::label('surname', 'surname(Thai)'); !!}
                                                {!! Form::text('e_surname', null,
                                                    ['class' => 'form-control',($errors->has('e_surname') ? 'is-invalid' : '') ,]); !!}
                                                {!! $errors->first('e_surname', '<p class="text-red">:message</p>') !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </div>
                            <div class="row">
                                <tr>
                                    <td>
                                        <div class="col">
                                            <div class="form-group">
                                                {!! Form::label('nickname', 'nickname'); !!}
                                                {!! Form::text('e_nickname', null,
                                                    ['class' => 'form-control',($errors->has('nickname') ? 'is-invalid' : '') ,]); !!}
                                                {!! $errors->first('nickname', '<p class="text-red">:message</p>') !!}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col">
                                            <div class="form-group">
                                                {!! Form::label('phone', 'Phone'); !!}
                                                {!! Form::text('e_phone', null,
                                                    ['class' => 'form-control',($errors->has('e_phone') ? 'is-invalid' : '') ,]); !!}
                                                {!! $errors->first('e_phone', '<p class="text-red">:message</p>') !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('relation', 'relation'); !!}
                                            {!! Form::select('relation_id', $relation , null , ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        {!! Form::submit('บันทึก', ['class' => 'btn btn-primary']) !!}
                                        <a href=" {{ route('employee.employee_desc',$contact->emp_id) }} " class="btn btn-success"> ย้อนกลับ </a>
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


