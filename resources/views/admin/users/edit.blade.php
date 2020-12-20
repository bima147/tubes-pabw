@extends('layouts.app')

@section('content')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Artikel</h2>
                                @if(count($errors) > 0)
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{session('error')}}
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Edit</strong> Artikel
                                    </div>
                                    <div class="card-body card-block">
                                        {!! Form::open(['action' => 'Admin\UsersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group">
                                                {{ Form::label('name',  'Nama Pengguna') }}
                                                <input placeholder="{{ $users->name }}" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('email',  'Email Pengguna') }}
                                                <input placeholder="{{ substr_replace($users->email, str_repeat('*', strpos($users->email, '@')-2), 1, strpos($users->email, '@')-2) }}" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('password',  'Password') }}
                                                {{ Form::text('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password pengguna', 'autocomplete' => 'off']) }}
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                                                <a href="javascript:history.go(-1)" title="Back">
                                                    <button class="btn btn-info btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                                </a>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6" style="text-align: right;">
                                                {{ Form::hidden('_method', 'PUT') }}
                                                {{ Form::submit('Ubah',  ['class'=>'btn btn-primary']) }}
                                            </div>
                                        </div>
                                    </div>
                                        {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
@endsection