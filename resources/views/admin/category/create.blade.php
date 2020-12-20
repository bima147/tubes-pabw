@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><b>Buat</b> Kategori</h2>
                        </div>
                        <div class="col-lg-12">
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
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                  {!! Form::open(['action' => 'Admin\CategoryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="mb-3">

                        {{ Form::label('nama_kategori',  'Nama Kategori') }}
                        {{ Form::text('nama_kategori', '', ['class' => 'form-control', 'placeholder' => 'Masukkan nama kategori', 'autocomplete' => 'off', 'required']) }}
                        <div class="form-text"><small>Contoh : Ikan Laut</small></div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;">Tambah</button>
                  {!! Form::close() !!}
                    <a href="{{ url('admin/category') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
