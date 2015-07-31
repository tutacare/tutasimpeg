@extends('iframe-app')

@section('content')


{!! Form::open(array('url' => 'image-kartu-induk-pegawai', 'files' => true)) !!}
<table>
  <tr><td>
    {!! Html::ul($errors->all()) !!}

    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    {!! Form::hidden('id', $kartuIndukPegawai->id) !!}
    <div class="form-group">
    {!! Form::label('foto', 'FOTO') !!}
    {!! Form::file('foto', Input::old('foto'), array('class' => 'form-control')) !!}
    </div>
    {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
    {!! Form::close() !!}
</td><td>
<img src="/images/pegawai/{{$kartuIndukPegawai->foto}}" />
</td></tr></table>


@endsection
