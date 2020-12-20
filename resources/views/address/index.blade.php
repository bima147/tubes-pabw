@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-lg-10">
                            <h4>Alamat Anda</h4>
                        </div>
                        <div class="col-lg-2">
                            <a href="{{ url('alamat/create') }}" class="btn btn-success btn-sm" title="Create Address"><small>Tambah Alamat</small></a>
                        </div>
                    </div>
                    @foreach($address as $addr)
                        @if ($addr->user_id == Auth::user()->id)
                        <div class="d-flex py-2 border-bottom">
                            <div class="wrapper">
                                <h5 class="font-weight-semibold text-gray mb-0">{!! ($addr->penerima) !!}</h5>
                            <p class="text-muted">
                                (+62) {!! ($addr->no_hp) !!}
                                <br>
                                {!! ($addr->alamat) !!} 
                                <br>
                                {!! ($addr->kota) !!} - {!! $addr->kecamatan !!}, {!! ($addr->provinsi) !!}, ID {!! ($addr->kode_pos) !!}
                            </p>
                            </div>
                            <small class="text-muted ml-auto"><a href="{{ url('alamat/' . $addr->id . '/edit') }}" style="text-decoration: none;">Ubah Alamat</a></small>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
@endsection