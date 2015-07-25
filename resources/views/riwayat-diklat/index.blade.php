@extends('iframe-app')

@section('content')
<h3>Riwayat Diklat <a class="btn btn-small btn-success" href="{{ URL::to('riwayat-diklat/create') }}">Tambah Baru</a> </h3>

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
							<td>Nama Diklat</td>
							<td>Diklat Lain</td>
              <td>Penyelenggara</td>
              <td>Tahun</td>
              <td>Bulan</td>
              <td>Hari</td>
              <td>Jam</td>
							<td>Ganti</td>
							<td>Hapus</td>
					</tr>
			</thead>
			<tbody>
				@foreach($riwayat_diklat as $value)
						<tr>
								<td>{{ $value->nama_diklat }}</td>
								<td>{{ $value->diklat_lain }}</td>
								<td>{{ $value->penyelenggara_diklat }}</td>
                <td>{{ $value->tahun_penyelenggaraan }}</td>
                <td>{{ $value->lama_diklat_bulan }}</td>
                <td>{{ $value->lama_diklat_hari }}</td>
                <td>{{ $value->lama_diklat_jam }}</td>
								<td>
										<a class="btn btn-xs btn-info" href="{{ URL::to('riwayat-diklat/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
									</td><td>

										{!! Form::open(array('url' => 'riwayat-diklat/' . $value->id)) !!}
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
