@extends('layouts.app')

@section('content')
    @if ($address->user_id == Auth::user()->id)
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Alamat</h2>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Lihat</strong> Alamat
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">No Hp</label>
                                                <input placeholder="{{ $address->no_hp }}" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Alamat</label>
                                                <input placeholder="{{ $address->jalan }}" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Provinsi</label>
                                                <input placeholder="{{ $address->provinsi }}" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Kota</label>
                                                <input placeholder="{{ $address->kota }}" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Kode Pos</label>
                                                <input placeholder="{{ $address->kode_pos }}" class="form-control" readonly>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12 col-md-12 col-xl-6">
                                                <a href="javascript:history.go(-1)" title="Back">
                                                    <button class="btn btn-info btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                                </a>
                                            </div>
                                            <div class="col-lg-6 col-sm-12" style="text-align: right;">
                                                <a href="{{ url('/alamat/' . $address->id . '/edit') }}" title="Edit User">
                                                    <button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                </a>
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'url' => ['/alamat', $address->id],
                                                        'style' => 'display:inline'
                                                    ]) !!}
                                                        {!! Form::button('<i class="fa fa-trash-alt" aria-hidden="true"></i> Delete', array(
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-danger btn-sm',
                                                                'title' => 'Delete User',
                                                                'onclick'=>'return confirm("Apakah kamu yakin mau menghapus user ini?")'
                                                        ))!!}
                                                    {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    @endif
@endsection