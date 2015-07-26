@extends('iframe-app')

@section('content')
<h3>Riwayat Suami/Istri <a class="btn btn-small btn-success" href="{{ URL::to('riwayat-suami-istri/create') }}">Tambah Baru</a> </h3>

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
							<td>Nama</td>
              <td>TGL. Lahir</td>
							<td>TGL. Nikah</td>
							<td>TGL. Pisah</td>
              <td>Pekerjaan</td>
							<td>Ganti</td>
							<td>Hapus</td>
					</tr>
			</thead>
			<tbody>
				@foreach($riwayat_suami_istri as $value)
						<tr>
								<td>{{ $value->nama }}</td>
								<td>{{ date('d-m-Y', strtotime($value->tgl_lahir)) }}</td>
								<td>{{ date('d-m-Y', strtotime($value->tgl_nikah)) }}</td>
                @if($value->tgl_pisah <> NULL)
                <td>{{ date('d-m-Y', strtotime($value->tgl_pisah)) }}</td>
                @else
                <td>&nbsp;</td>
                @endif
								<td>{{ $value->pekerjaan }}</td>
								<td>
										<a class="btn btn-xs btn-info" href="{{ URL::to('riwayat-suami-istri/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
									</td><td>

										{!! Form::open(array('url' => 'riwayat-suami-istri/' . $value->id)) !!}
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
