@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Kartu Induk Pegawai</div>
				<div class="panel-body">
          {!! Html::ul($errors->all()) !!}

					@if (Session::has('message'))
	        <div class="col-md-12">
						<div class="alert alert-info alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{{ Session::get('message') }}
						</div>
	        </div>
	        @endif

                  {!! Form::model($kartuIndukPegawai, array('route' => array('kartu-induk-pegawai.update', $kartuIndukPegawai->id), 'method' => 'PUT', 'files' => true)) !!}

                  <div class="row" ng-controller="KartuPegawaiCtrl">
                    <div class="col-md-4">

                  <div class="form-group">
                  {!! Form::label('nip', 'NIP') !!}
                  {!! Form::text('nip', Input::old('nip'), array('class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                  {!! Form::label('karpeg', 'KARPEG') !!}
                  {!! Form::text('karpeg', Input::old('karpeg'), array('class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                  {!! Form::label('nama_lengkap', 'Nama Lengkap') !!}
                  {!! Form::text('nama_lengkap', Input::old('nama_lengkap'), array('class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                  {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
                  {!! Form::text('tempat_lahir', Input::old('tempat_lahir'), array('class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
                    <label class="radio-inline">
                      {!! Form::radio('jenis_kelamin', 'Pria', true) !!} Pria
                    </label>
                    <label class="radio-inline">
                      {!! Form::radio('jenis_kelamin', 'Wanita') !!} Wanita
                    </label>
                  </div>

    							<div class="form-group">
    								{!! Form::label('tgl_masuk_pegawai', 'Masuk Pegawai (dd-mm-yyyy)') !!}
										<input type="text" id="tgl_masuk_pegawai" value='{{date('d-m-Y', strtotime($kartuIndukPegawai->tgl_masuk_pegawai))}}' name="tgl_masuk_pegawai" class="form-control">
                  </div>

    							<div class="form-group">
    									{!! Form::label('agama', 'Agama') !!}
    									{!! Form::select('agama', array('Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha'), Input::old('agama'), array('class' => 'form-control')) !!}
    							</div>

                </div>

                <div class="col-md-4">

                  <div class="form-group">
                  {!! Form::label('karis_karsu', 'KARIS/KARSU') !!}
                  {!! Form::text('karis_karsu', Input::old('karis_karsu'), array('class' => 'form-control')) !!}
                  </div>

    							<div class="form-group">
    								{!! Form::label('tgl_lahir', 'Tanggal Lahir (dd-mm-yyyy)') !!}
										<input type="text" id="tgl_lahir" ng-init="tgl_lahir_model='{{date('d-m-Y', strtotime($kartuIndukPegawai->tgl_lahir))}}'" ng-model="tgl_lahir_model" ng-change="getTglPensiun(tgl_lahir_model)" name="tgl_lahir" class="form-control">
    							</div>

    							<div class="form-group">
    									{!! Form::label('status_perkawinan', 'Status Perkawinan') !!}
    									{!! Form::select('status_perkawinan', array('Kawin' => 'Kawin', 'Belum Kawin' => 'Belum Kawin'), Input::old('status_perkawinan'), array('class' => 'form-control')) !!}
    							</div>

    							<div class="form-group">
    									{!! Form::label('status_kepegawaian', 'Status Kepegawaian') !!}
    									{!! Form::select('status_kepegawaian', array('PNS' => 'PNS', 'Honor' => 'Honor'), Input::old('status_kepegawaian'), array('class' => 'form-control')) !!}
    							</div>

    							<div class="form-group">
    									{!! Form::label('jenis_kepegawaian', 'Jenis Kepegawaian') !!}
    									{!! Form::select('jenis_kepegawaian', array('PNS Pusat' => 'PNS Pusat', 'PNS Cabang' => 'PNS Cabang'), Input::old('jenis_kepegawaian'), array('class' => 'form-control')) !!}
    							</div>

                </div>

                <div class="col-md-4">

                  <div class="form-group">
                  {!! Form::label('tgl_pensiun', 'Tanggal Pensiun (dd-mm-yyyy)') !!}
    							<input name="tgl_pensiun" ng-model="tgl_pensiun_model" ng-init="tgl_pensiun_model='{{date('d-m-Y', strtotime($kartuIndukPegawai->tgl_pensiun))}}'" class="form-control" readonly>
                  </div>

    							<div class="form-group">
    							{!! Form::label('foto', 'FOTO') !!}
									<p><img src="/images/pegawai/{{$kartuIndukPegawai->foto}}"></p>
    							{!! Form::file('foto', Input::old('foto'), array('class' => 'form-control')) !!}
    							</div>


                  </div>
                </div>
                {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

                {!! Form::close() !!}
      				</div>
      			</div>
      		</div>
      	</div>
      </div>
      @endsection
