@extends('iframe-app')

@section('content')
<h3>Tambah Riwayat Anak</h3>
{!! Html::ul($errors->all()) !!}

@if (Session::has('message'))
<div class="col-md-12">
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('message') }}
	</div>
</div>
@endif

{!! Form::open(array('url' => 'riwayat-anak')) !!}
{!! Form::hidden('ids', Session::get('ids')) !!}
<div class="row">

	<div class="col-md-6">

		<div class="form-group">
		{!! Form::label('nama', 'Nama') !!}
		{!! Form::text('nama', Input::old('nama'), array('class' => 'form-control')) !!}
		</div>

    <div class="form-group">
      {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
      <label class="radio-inline">
        {!! Form::radio('jenis_kelamin', 'Pria', true) !!} Pria
      </label>
      <label class="radio-inline">
        {!! Form::radio('jenis_kelamin', 'Wanita') !!} Wanita
      </label>
    </div>

    <div class="form-group">
		{!! Form::label('tgl_lahir', 'TGL. Lahir (dd-mm-yyyy)') !!}
		{!! Form::text('tgl_lahir', Input::old('tgl_lahir'), array('class' => 'form-control', 'id' => 'tgl_lahir')) !!}
		</div>

	</div>

	<div class="col-md-6">

    <div class="form-group">
		{!! Form::label('status_anak', 'Status Anak') !!}
		{!! Form::text('status_anak', Input::old('status_anak'), array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('keterangan', 'Keterangan') !!}
		{!! Form::text('keterangan', Input::old('keterangan'), array('class' => 'form-control')) !!}
		</div>

	</div>
</div>
{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
<a class="btn btn-small btn-warning" href="{{ URL::to('riwayat-anak') }}">Batal</a>
{!! Form::close() !!}
@endsection
