@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Kartu Induk Pegawai</div>
				<div class="panel-body">
          <a class="btn btn-small btn-success" href="{{ URL::to('kartu-induk-pegawai/create') }}">Buat Baru</a>
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
                      <td>NIP</td>
                      <td>Nama</td>
											<td>tgl_masuk_pegawai</td>
											<td>tgl_pensiun</td>
                      <td colspan="2">&nbsp;</td>
                  </tr>
              </thead>
              <tbody>
              @foreach($kartu_induk_pegawai as $value)
                  <tr>
                      <td>{{ $value->nip }}</td>
                      <td>{{ $value->nama_lengkap }}</td>
											<td>{{ date('d-m-Y', strtotime($value->tgl_masuk_pegawai)) }}</td>
											<td>{{ $value->tgl_pensiun }}</td>
                      <td>
                          <a class="btn btn-xs btn-info" href="{{ URL::to('kartu-induk-pegawai/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        </td><td>

                          {!! Form::open(array('url' => 'kartu-induk-pegawai/' . $value->id)) !!}
                              {!! Form::hidden('_method', 'DELETE') !!}
                              <button class="btn btn-xs btn-danger" onClick="return confirm('Benar ingin menghapus?')" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                          {!! Form::close() !!}
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
