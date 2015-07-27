@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Kartu Induk Pegawai</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
          <a class="btn btn-small btn-success" href="{{ URL::to('kartu-induk-pegawai/create') }}">Buat Baru</a>
						</div>
						<div class="col-md-6">
							{!! Form::open(array('url' => 'kartu-induk-pegawai/search', 'class' => 'form-inline')) !!}
					<div class="form-group pull-right">
						<label for="pencarian">Pencarian</label>
					{!! Form::text('query', Input::old('query'), array('class' => 'form-control', 'required' => 'required')) !!}
					<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
					</div>


				{!! Form::close() !!}
				</div>
			</div>
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
											<td>Jabatan</td>
											<td>Riwayat</td>
											<td>Tampilkan</td>
											<td>Cetak</td>
                      <td>Ganti</td>
											<td>Hapus</td>
                  </tr>
              </thead>
              <tbody>
              @foreach($kartu_induk_pegawai as $value)
                  <tr>
                      <td>{{ $value->nip }}</td>
                      <td>{{ $value->nama_lengkap }}</td>
											<td><a class="btn btn-xs btn-warning" href="{{ URL::to('kartu-induk-pegawai/' . $value->id . '/jabatan') }}"><span class="glyphicon glyphicon-queen" aria-hidden="true"></span></a></td>
                      <td><a class="btn btn-xs btn-success" href="{{ URL::to('kartu-induk-pegawai/' . $value->id . '/riwayat') }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></a></td>
											<td><a class="btn btn-xs btn-primary" href="{{ URL::to('kartu-induk-pegawai/' . $value->id) }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></td>
											<td><a class="btn btn-xs btn-default" href="{{ URL::to('kartu-induk-pegawai/' . $value->id . '/cetak') }}"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a></td>
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
