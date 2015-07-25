@extends('iframe-app')

@section('content')
<h3>Ganti Riwayat Diklat</h3>
{!! Html::ul($errors->all()) !!}

@if (Session::has('message'))
<div class="col-md-12">
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('message') }}
	</div>
</div>
@endif

{!! Form::model($riwayat_diklat, array('route' => array('riwayat-diklat.update', $riwayat_diklat->id), 'method' => 'PUT')) !!}
<div class="row">

	<div class="col-md-6">

		<div class="form-group">
		{!! Form::label('nama_diklat', 'Nama Diklat') !!}
		{!! Form::text('nama_diklat', Input::old('nama_diklat'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('diklat_lain', 'Diklat Lain') !!}
		{!! Form::text('diklat_lain', Input::old('diklat_lain'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('penyelenggara_diklat', 'Penyelenggara Diklat') !!}
		{!! Form::text('penyelenggara_diklat', Input::old('penyelenggara_diklat'), array('class' => 'form-control')) !!}
		</div>

    <div class="form-group">
		{!! Form::label('tahun_penyelenggaraan', 'Tahun Penyelenggaraan') !!}
		{!! Form::text('tahun_penyelenggaraan', Input::old('tahun_penyelenggaraan'), array('class' => 'form-control')) !!}
		</div>

	</div>

	<div class="col-md-6">

		<div class="form-group">
		{!! Form::label('lama_diklat_bulan', 'Lama Diklat (Bulan)') !!}
		{!! Form::text('lama_diklat_bulan', Input::old('lama_diklat_bulan'), array('class' => 'form-control')) !!}
		</div>

    <div class="form-group">
		{!! Form::label('lama_diklat_hari', 'Lama Diklat (Hari)') !!}
		{!! Form::text('lama_diklat_hari', Input::old('lama_diklat_hari'), array('class' => 'form-control')) !!}
		</div>

    <div class="form-group">
		{!! Form::label('lama_diklat_jam', 'Lama Diklat (Jam)') !!}
		{!! Form::text('lama_diklat_jam', Input::old('lama_diklat_jam'), array('class' => 'form-control')) !!}
		</div>

	</div>
</div>
{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
<a class="btn btn-small btn-warning" href="{{ URL::to('riwayat-diklat') }}">Batal</a>
{!! Form::close() !!}
@endsection
