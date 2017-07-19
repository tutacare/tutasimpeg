@extends('iframe-app')

@section('content')
<h3>Tambah Riwayat Suami/Istri</h3>
{!! Html::ul($errors->all()) !!}

@if (Session::has('message'))
<div class="col-md-12">
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('message') }}
	</div>
</div>
@endif

{!! Form::open(array('url' => 'riwayat-suami-istri')) !!}
{!! Form::hidden('ids', Session::get('ids')) !!}
<div class="row">

	<div class="col-md-6">

		<div class="form-group">
		{!! Form::label('nama', 'Nama') !!}
		{!! Form::text('nama', Input::old('nama'), array('class' => 'form-control')) !!}
		</div>


		<div class="form-group">
		{!! Form::label('tgl_lahir', 'TGL. Lahir (dd-mm-yyyy)') !!}
		{!! Form::text('tgl_lahir', Input::old('tgl_lahir'), array('class' => 'form-control', 'id' => 'tgl_lahir')) !!}
		</div>

    <div class="form-group">
		{!! Form::label('tgl_nikah', 'TGL. Nikah (dd-mm-yyyy)') !!}
		{!! Form::text('tgl_nikah', Input::old('tgl_nikah'), array('class' => 'form-control', 'id' => 'tgl_nikah')) !!}
		</div>

	</div>

	<div class="col-md-6">

    <div class="form-group">
		{!! Form::label('tgl_pisah', 'TGL. Pisah (dd-mm-yyyy)') !!}
		{!! Form::text('tgl_pisah', Input::old('tgl_pisah'), array('class' => 'form-control', 'id' => 'tgl_pisah')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('pekerjaan', 'Pekerjaan') !!}
		{!! Form::text('pekerjaan', Input::old('pekerjaan'), array('class' => 'form-control', 'maxlength' => '4')) !!}
		</div>

	</div>
</div>
{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
<a class="btn btn-small btn-warning" href="{{ URL::to('riwayat-suami-istri') }}">Batal</a>
{!! Form::close() !!}
@endsection
