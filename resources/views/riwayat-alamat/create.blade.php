@extends('iframe-app')

@section('content')
<h3>Tambah Riwayat Alamat</h3>
{!! Html::ul($errors->all()) !!}

@if (Session::has('message'))
<div class="col-md-12">
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('message') }}
	</div>
</div>
@endif

{!! Form::open(array('url' => 'riwayat-alamat')) !!}
{!! Form::hidden('ids', Session::get('ids')) !!}
<div class="row">

	<div class="col-md-6">

		<div class="form-group">
		{!! Form::label('alamat', 'Alamat') !!}
		{!! Form::text('alamat', Input::old('alamat'), array('class' => 'form-control')) !!}
		</div>

    <div class="form-group">
		{!! Form::label('telepon', 'Telepon') !!}
		{!! Form::text('telepon', Input::old('telepon'), array('class' => 'form-control')) !!}
		</div>

    <div class="form-group">
		{!! Form::label('kabupaten_kota', 'Kabupaten/Kota') !!}
		{!! Form::text('kabupaten_kota', Input::old('kabupaten_kota'), array('class' => 'form-control')) !!}
		</div>

	</div>

	<div class="col-md-6">

    <div class="form-group">
    {!! Form::label('provinsi', 'Provinsi') !!}
    {!! Form::text('provinsi', Input::old('provinsi'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
		{!! Form::label('kode_pos', 'Kode Pos') !!}
		{!! Form::text('kode_pos', Input::old('kode_pos'), array('class' => 'form-control')) !!}
		</div>

	</div>
</div>
{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
<a class="btn btn-small btn-warning" href="{{ URL::to('riwayat-alamat') }}">Batal</a>
{!! Form::close() !!}
@endsection
