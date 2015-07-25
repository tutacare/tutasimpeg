@extends('iframe-app')

@section('content')
<h3>Tambah Riwayat Jabatan</h3>
{!! Html::ul($errors->all()) !!}

@if (Session::has('message'))
<div class="col-md-12">
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('message') }}
	</div>
</div>
@endif

{!! Form::open(array('url' => 'riwayat-jabatan')) !!}
{!! Form::hidden('ids', Session::get('ids')) !!}
<div class="row">

	<div class="col-md-6">

		<div class="form-group">
		{!! Form::label('jabatan_utama', 'Jabatan Utama') !!}
		{!! Form::text('jabatan_utama', Input::old('jabatan_utama'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('bidang_studi_mata_kuliah', 'Bid. Studi / Mata Kuliah') !!}
		{!! Form::text('bidang_studi_mata_kuliah', Input::old('bidang_studi_mata_kuliah'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('unit_kerja', 'Unit Kerja') !!}
		{!! Form::text('unit_kerja', Input::old('unit_kerja'), array('class' => 'form-control')) !!}
		</div>

    <div class="form-group">
		{!! Form::label('no_sk', 'No. SK') !!}
		{!! Form::text('no_sk', Input::old('no_sk'), array('class' => 'form-control')) !!}
		</div>

	</div>

	<div class="col-md-6">

    <div class="form-group">
		{!! Form::label('tgl_sk', 'TGL. SK (dd-mm-yyyy)') !!}
		{!! Form::text('tgl_sk', Input::old('tgl_sk'), array('class' => 'form-control', 'id' => 'tgl_sk')) !!}
		</div>

    <div class="form-group">
		{!! Form::label('tmt_sk', 'TMT. SK (dd-mm-yyyy)') !!}
		{!! Form::text('tmt_sk', Input::old('tmt_sk'), array('class' => 'form-control', 'id' => 'tmt_sk')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('keterangan_jabatan', 'Keterangan Jabatan') !!}
		{!! Form::text('keterangan_jabatan', Input::old('keterangan_jabatan'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('golongan_pangkat', 'Golongan Pangkat') !!}
		{!! Form::text('golongan_pangkat', Input::old('golongan_pangkat'), array('class' => 'form-control')) !!}
		</div>

	</div>
</div>
{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
<a class="btn btn-small btn-warning" href="{{ URL::to('riwayat-jabatan') }}">Batal</a>
{!! Form::close() !!}
@endsection
