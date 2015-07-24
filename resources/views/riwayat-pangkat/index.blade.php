@extends('iframe-app')

@section('content')
<h3>Riwayat Pangkat <a class="btn btn-small btn-success" href="{{ URL::to('riwayat-pangkat/create') }}">Tambah Baru</a> </h3>

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
							<td>Golongan Pangkat</td>
							<td>No. SK</td>
							<td>TGL. SK</td>
							<td>TMT. SK</td>
							<td>Masa Kerja (Tahun)</td>
							<td>Masa Kerja (Bulan)</td>
							<td>Ganti</td>
							<td>Hapus</td>
					</tr>
			</thead>
			<tbody>
				@foreach($riwayat_pangkat as $value)
						<tr>
								<td>{{ $value->golongan_pangkat }}</td>
								<td>{{ $value->no_sk }}</td>
								<td>{{ date('d-m-Y', strtotime($value->tgl_sk)) }}</td>
								<td>{{ date('d-m-Y', strtotime($value->tmt_sk)) }}</td>
								<td>{{ $value->masakerja_tahun }}</td>
								<td>{{ $value->masakerja_bulan }}</td>
								<td>
										<a class="btn btn-xs btn-info" href="{{ URL::to('riwayat-pangkat/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
									</td><td>

										{!! Form::open(array('url' => 'riwayat-pangkat/' . $value->id)) !!}
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
