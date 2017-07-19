@extends('iframe-app')

@section('content')
<h3>Tambah Riwayat Pendidikan</h3>
{!! Html::ul($errors->all()) !!}

@if (Session::has('message'))
<div class="col-md-12">
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('message') }}
	</div>
</div>
@endif

{!! Form::open(array('url' => 'riwayat-pendidikan')) !!}
{!! Form::hidden('ids', Session::get('ids')) !!}
<div class="row">

	<div class="col-md-6">

		<div class="form-group">
		{!! Form::label('nama_sekolah', 'Nama Sekolah') !!}
		{!! Form::text('nama_sekolah', Input::old('nama_sekolah'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('tingkat', 'Tingkat') !!}
		{!! Form::text('tingkat', Input::old('tingkat'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('fakultas', 'Fakultas') !!}
		{!! Form::text('fakultas', Input::old('fakultas'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('akta', 'Akta') !!}
		{!! Form::checkbox('akta', 'Y') !!}
		</div>

	</div>

	<div class="col-md-6">

		<div class="form-group">
		{!! Form::label('jurusan', 'Jurusan') !!}
		{!! Form::text('jurusan', Input::old('jurusan'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('tahun_lulus', 'Tahun Lulus') !!}
		{!! Form::text('tahun_lulus', Input::old('tahun_lulus'), array('class' => 'form-control', 'maxlength' => '4')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('lokasi_sekolah', 'Lokasi Sekolah') !!}
		{!! Form::text('lokasi_sekolah', Input::old('lokasi_sekolah'), array('class' => 'form-control')) !!}
		</div>

	</div>
</div>
{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
<a class="btn btn-small btn-warning" href="{{ URL::to('riwayat-pendidikan') }}">Batal</a>
{!! Form::close() !!}
@endsection
