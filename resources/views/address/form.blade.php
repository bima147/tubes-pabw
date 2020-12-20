<div class="form-group{{ $errors->has('jalan') ? ' has-error' : ''}}">
    {!! Form::label('jalan', 'Alamat Lengkap : ', ['class' => 'control-label']) !!}
    {!! Form::textarea('jalan', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('jalan', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('provinsi') ? ' has-error' : ''}}">
    {!! Form::label('provinsi', 'Provinsi : ', ['class' => 'control-label']) !!}
    {!! Form::text('provinsi', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('provinsi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('kota') ? ' has-error' : ''}}">
    {!! Form::label('kota', 'Kota : ', ['class' => 'control-label']) !!}
    {!! Form::text('kota', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('kota', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('kode_pos') ? ' has-error' : ''}}">
    {!! Form::label('kode_pos', 'Kode Pos : ', ['class' => 'control-label']) !!}
    {!! Form::number('kode_pos', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('kode_pos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
