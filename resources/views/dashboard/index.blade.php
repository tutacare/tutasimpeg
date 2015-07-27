@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Dashboard</div>
				<div class="panel-body">
				Selamat Datang di TUTA SIMPEG - Sistem Informasi Manajemen Kepegawaian
				<hr />

				<div class="panel panel-default">
<div class="panel-heading">
	<h3 class="panel-title">Statistik</h3>
</div>
<div class="panel-body">
	<div class="row">
		<div class="col-md-12">
			<div class="well">Total Pegawai : {{$pegawai}}</div>
		</div>

	</div>

</div>
</div>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
