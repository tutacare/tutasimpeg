<!DOCTYPE html>
<html>
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


      <h3>Riwayat Pendidikan <a class="btn btn-small btn-success" href="{{ URL::to('riwayat-pendidikan/create') }}">Tambah Baru</a> </h3>

        <hr />
        @if (Session::has('message'))
        <div class="col-md-12">
          <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('message') }}
          </div>
        </div>
        @endif
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Nama Sekolah</td>
                    <td>Tingkat</td>
                    <td>Fakultas</td>
                    <td>Jurusan</td>
                    <td>Tahun</td>
                    <td>Akta</td>
                    <td>Ganti</td>
                    <td>Hapus</td>
                </tr>
            </thead>
            <tbody>
              @foreach($riwayat_pendidikan as $value)
                  <tr>
                      <td>{{ $value->nama_sekolah }}</td>
                      <td>{{ $value->tingkat }}</td>
                      <td>{{ $value->fakultas }}</td>
                      <td>{{ $value->jurusan }}</td>
                      <td>{{ $value->tahun_lulus }}</td>
                      <td>{{ $value->akta }}</td>
                      <td>
                          <a class="btn btn-xs btn-info" href="{{ URL::to('riwayat-pendidikan/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        </td><td>

                          {!! Form::open(array('url' => 'riwayat-pendidikan/' . $value->id)) !!}
                              {!! Form::hidden('_method', 'DELETE') !!}
                              <button class="btn btn-xs btn-danger" onClick="return confirm('Benar ingin menghapus?')" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                          {!! Form::close() !!}
                      </td>
                  </tr>
              @endforeach
            </tbody>
        </table>


  </div>


</body>
</html>
