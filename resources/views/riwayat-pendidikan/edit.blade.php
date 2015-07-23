<!DOCTYPE html>
<html ng-app="tutasim">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TutaSIMPEG</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link href="{{ asset('/css/footer.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.min.css">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="http://tutahosting.net/wp-content/uploads/2015/01/tutaico.png" type="image/x-icon" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>


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

      {!! Form::model($riwayat_pendidikan, array('route' => array('riwayat-pendidikan.update', $riwayat_pendidikan->id), 'method' => 'PUT')) !!}
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
          @if ($riwayat_pendidikan->akta === 'Y')
          <input checked="checked" name="akta" type="checkbox" value="Y">
          @else
          <input name="akta" type="checkbox" value="Y">
          @endif
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




</body>
</html>
