@extends('iframe-app')

@section('content')
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
@endsection
