@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Export File Excel</div>
				<div class="panel-body">
					@if (Session::has('message'))
	        <div class="col-md-12">
						<div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{{ Session::get('message') }}
						</div>
	        </div>
	        @endif
        Kartu Induk Pegawai
        <hr />

<a class="btn btn-primary" href="{{ url('/export-kartu-induk-pegawai') }}" role="button"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Export Ke Excel</a>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
