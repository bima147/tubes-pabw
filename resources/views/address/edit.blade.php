@extends('layouts.app')

@section('content')
    @if ($address->user_id == Auth::user()->id)
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="/alamat" class="btn btn-warning d-block" style="float: left; margin-right: 10px;"><i class="mdi mdi-arrow-left"></i></a><h4 ><b>Ubah</b> Alamat</h4>
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
                                <br>
                                {!! Form::open(['action' => ['AddressController@update', $address->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama Penerima</label>
                                            <input type="text" class="form-control" name="penerima" placeholder="Masukkan nama penerima" value="{{ $address->penerima }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>No Telepon / HP</label>
                                            <input type="number" class="form-control" name="no_hp" placeholder="Masukkan no telepon / hp" value="{{ $address->no_hp }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Alamat Lengkap</label>
                                            <textarea name="alamat" class="form-control" cols="30" rows="5" placeholder="Masukkan alamat anda dengan lengkap">{{ $address->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kode Pos</label>
                                            <input type="number" name="kode_pos" class="form-control" value="{{ $address->kode_pos }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <input type="text" name="kecamatan" class="form-control" value="{{ $address->kecamatan }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <input type="text" name="kota" class="form-control" placeholder="Masukkan kota anda" value="{{ $address->kota }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <input type="text" name="provinsi" class="form-control" placeholder="Masukkan provinsi anda" value="{{ $address->provinsi }}">
                                        </div>
                                    </div>
                                </div>
                                {{ Form::hidden('_method', 'PUT') }}
                                  <button type="submit" class="btn btn-success mr-2" style="float: right;"><i class="mdi mdi-pencil"></i> Ubah</button>
                                {!! Form::close() !!}
                                {!! Form::open(['method' => 'DELETE', 'url' => ['alamat', $address->id]]) !!}
                                    {!! Form::button('<i class="mdi mdi-trash-can-outline" aria-hidden="true"></i> Hapus', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger',
                                        'title' => 'Delete Article',
                                        'onclick'=>'return confirm("Apakah kamu yakin mau menghapus alamat ini?")'
                                            )) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    @else
        <script type="text/javascript">
            window.location = "{{ url('/') }}";//here double curly bracket
        </script>
    @endif
@endsection