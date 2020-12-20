@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4><b>Tambah</b> Alamat</h4>
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
                            {!! Form::open(['action' => 'AddressController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Penerima</label>
                                        <input type="text" class="form-control" name="penerima" placeholder="Masukkan nama penerima" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>No Telepon / HP</label>
                                        <div class="row">
                                            <div class="col-lg-1">
                                                +
                                            </div>
                                            <div class="col-lg-11">
                                                <input type="number" class="form-control" name="no_hp" placeholder="contoh : 62801234567891" required>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Alamat Lengkap</label>
                                        <textarea name="alamat" class="form-control" cols="30" rows="5" placeholder="Masukkan alamat anda dengan lengkap" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="number" name="kode_pos" class="form-control" placeholder="Masukkan kode pos anda" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control" placeholder="Masukkan kode pos anda" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input type="text" name="kota" class="form-control" placeholder="Masukkan kota anda" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input type="text" name="provinsi" class="form-control" placeholder="Masukkan provinsi anda" required>
                                    </div>
                                </div>
                            </div>
                              <button type="submit" class="btn btn-success mr-2" style="float: right;">Tambah</button>
                            {!! Form::close() !!}
                              <a href="/alamat" class="btn btn-danger" style="float: left;">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection