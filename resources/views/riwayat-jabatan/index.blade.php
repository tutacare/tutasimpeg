@extends('iframe-app')

@section('content')
<h3>Riwayat Jabatan <a class="btn btn-small btn-success" href="{{ URL::to('riwayat-jabatan/create') }}">Tambah Baru</a> </h3>

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
							<td>Jabatan</td>
							<td>Satuan Kerja</td>
              <td>TMT. SK</td>
							<td>Ganti</td>
							<td>Hapus</td>
					</tr>
			</thead>
			<tbody>
				@foreach($riwayat_jabatan as $value)
						<tr>
								<td>{{ $value->jabatan_utama }}</td>
								<td>{{ $value->unit_kerja }}</td>
								<td>{{ date('d-m-Y', strtotime($value->tmt_sk)) }}</td>
								<td>
										<a class="btn btn-xs btn-info" href="{{ URL::to('riwayat-jabatan/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
									</td><td>

										{!! Form::open(array('url' => 'riwayat-jabatan/' . $value->id)) !!}
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
