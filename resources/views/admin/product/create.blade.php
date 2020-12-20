@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><b>Buat</b> Produk</h2>
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
                  {!! Form::open(['action' => 'Admin\ProductController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Form::label('nama_barang',  'Nama Produk') }}
                            {{ Form::text('nama_barang', '', ['class' => 'form-control', 'placeholder' => 'Contoh : Ikan Salmon', 'autocomplete' => 'off', 'required']) }}
                        </div>
                        <div class="col-lg-6">
                            {{ Form::label('deskripsi',  'Deskripsi Produk') }}
                            {{ Form::textarea('deskripsi', '', ['class' => 'form-control', 'placeholder' => 'Contoh : Ikan berasal dari Samudra Pasifik', 'autocomplete' => 'off', 'rows'=>'4', 'required']) }}
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    {{ Form::label('cat_id',  'Nama Kategori') }}
                                </div>
                                <div class="col-lg-12 form-group">
                                    <select id="cat_id" name="cat_id" class="form-control" style="width: 100%; height: 30px;">
                                        <option value="">Pilih Salah Satu</option>
                                        @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}" {{ old('cat_id') == $cat->id ? 'selected' : null }}>{{ $cat->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-text"><small>Note : Silahkan pilih salah satu kategori diatas</small></div>
                        </div>
                        <div class="col-lg-6">
                            {{ Form::label('stok',  'Stok Produk') }}
                            {{ Form::number('stok', '', ['class' => 'form-control', 'placeholder' => 'Contoh : 10', 'autocomplete' => 'off', 'required']) }}
                        </div>
                        <div class="col-lg-6">
                            {{ Form::label('harga',  'Harga Produk') }}
                            <p style="position: absolute; margin-top: 5px; margin-left: 10px;">Rp.</p>
                            {{ Form::number('harga', '', ['class' => 'form-control', 'style'=>'padding-left: 35px; border-top: none; border-right: none; border-left: none;', 'placeholder' => 'Contoh : Rp. 30000', 'autocomplete' => 'off', 'required']) }}
                            <small>Note : Harga yang dimasukkan adalah harga per kilo</small>
                        </div>
                        <div class="col-lg-6">
                            {{ Form::label('berat',  'Berat Produk') }}
                            <div class="row">
                                <div class="col-lg-11">
                                    {{ Form::number('berat', '', ['class' => 'form-control', 'style'=>'border-top: none; border-right: none; border-left: none;', 'step'=>'0.01', 'placeholder' => 'Contoh : 1.5', 'autocomplete' => 'off', 'required']) }}
                                </div>
                                <div class="col-lg-1">
                                    <p style="position: absolute; margin-top: 5px;">kg</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            {{ Form::label('gambar_1',  'Gambar Produk 1', ['style'=>'margin-top: 5px;']) }}
                            {{ Form::file('gambar1') }}
                        </div>
                        <div class="col-lg-4">
                            {{ Form::label('gambar_2',  'Gambar Produk 2', ['style'=>'margin-top: 5px;']) }}
                            {{ Form::file('gambar3') }}
                        </div>
                        <div class="col-lg-4">
                            {{ Form::label('gambar_3',  'Gambar Produk 3', ['style'=>'margin-top: 5px;']) }}
                            {{ Form::file('gambar3') }}
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary" style="float: right;">Tambah</button>
                  {!! Form::close() !!}
                    <a href="{{ url('admin/product') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
