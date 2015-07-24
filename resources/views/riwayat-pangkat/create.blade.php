@extends('iframe-app')

@section('content')
<h3>Tambah Riwayat Pangkat</h3>
{!! Html::ul($errors->all()) !!}

@if (Session::has('message'))
<div class="col-md-12">
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('message') }}
	</div>
</div>
@endif

{!! Form::open(array('url' => 'riwayat-pangkat')) !!}
{!! Form::hidden('ids', Session::get('ids')) !!}
<div class="row">

	<div class="col-md-6">

		<div class="form-group">
		{!! Form::label('golongan_pangkat', 'Golongan/Pangkat') !!}
		{!! Form::text('golongan_pangkat', Input::old('golongan_pangkat'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('no_sk', 'No. SK') !!}
		{!! Form::text('no_sk', Input::old('no_sk'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('tgl_sk', 'TGL. SK (dd-mm-yyyy)') !!}
		{!! Form::text('tgl_sk', Input::old('tgl_sk'), array('class' => 'form-control', 'id' => 'tgl_sk')) !!}
		</div>



	</div>

	<div class="col-md-6">

    <div class="form-group">
		{!! Form::label('tmt_sk', 'TMT. SK (dd-mm-yyyy)') !!}
		{!! Form::text('tmt_sk', Input::old('tmt_sk'), array('class' => 'form-control', 'id' => 'tmt_sk')) !!}
		</div>
    <hr />
		<div class="form-inline">
      <div class="form-group">
  		{!! Form::label('masa_kerja', 'Masa Kerja') !!}
  		{!! Form::text('masakerja_tahun', Input::old('masakerja_tahun'), array('class' => 'form-control', 'size' => '4')) !!}
      {!! Form::label('masakerja_tahun', 'Tahun') !!}
      {!! Form::text('masakerja_bulan', Input::old('masakerja_bulan'), array('class' => 'form-control', 'size' => '4')) !!}
      {!! Form::label('masakerja_bulan', 'Bulan') !!}
  		</div>
    </div>
    <hr />
		<div class="form-group">
		{!! Form::label('keterangan', 'Keterangan') !!}
		{!! Form::text('keterangan', Input::old('keterangan'), array('class' => 'form-control', 'maxlength' => '4')) !!}
		</div>



	</div>
</div>
{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
<a class="btn btn-small btn-warning" href="{{ URL::to('riwayat-pangkat') }}">Batal</a>
{!! Form::close() !!}
@endsection
