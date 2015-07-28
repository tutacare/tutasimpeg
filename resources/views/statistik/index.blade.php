@extends('chart-app')

@section('content')
<div class="container-fluid">
	<div class="row">
          <div class="col-sm-12" id="bar-chart" ng-controller="BarCtrl">
            <div class="panel panel-default">
              <div class="panel-heading">Grafik Pegawai Berdasarkan Usia</div>
              <div class="panel-body">
<canvas id="bar" class="chart chart-bar" data="data" labels="labels" series="series" options="options"></canvas>
              </div>
            </div>
          </div>

          <div class="col-sm-12">
            <table class="table table-bordered">
              <tr><th>Usia</th><th>Jumlah Pegawai</th></tr>
          @foreach($kartu_induk_pegawai as $value)
          <tr><td>{{$value->usia}} Tahun</td><td>{{$value->pegawai_count}} Pegawai</td></tr>
          @endforeach
        </table>
          </div>
	</div>
</div>
@endsection
