@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Jabatan Pegawai</div>
				<div class="panel-body">
          <h3>NIP: {{$kartu_induk_pegawai->nip}} - Nama: {{$kartu_induk_pegawai->nama_lengkap}}</h3><hr />
          {!! Html::ul($errors->all()) !!}

					@if (Session::has('message'))
	        <div class="col-md-12">
						<div class="alert alert-info alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{{ Session::get('message') }}
						</div>
	        </div>
	        @endif

          {!! Form::model($jabatan, array('route' => array('jabatan.update', $jabatan->id), 'method' => 'PUT')) !!}
          {!! Form::hidden('kartu_induk_pegawai_id', $kartu_induk_pegawai->id) !!}
          <div class="row">

        		<div class="col-md-6">

              <div class="form-group">
              {!! Form::label('jabatan', 'Jabatan') !!}
              {!! Form::text('jabatan', Input::old('jabatan'), array('class' => 'form-control')) !!}
              </div>

              <div class="form-group">
              {!! Form::label('unit_kerja', 'Unit Kerja') !!}
              {!! Form::text('unit_kerja', Input::old('unit_kerja'), array('class' => 'form-control')) !!}
              </div>

              <div class="form-group">
              {!! Form::label('keterangan_unit_kerja', 'Keterangan Unit Kerja') !!}
              {!! Form::text('keterangan_unit_kerja', Input::old('keterangan_unit_kerja'), array('class' => 'form-control')) !!}
              </div>

            </div>

            <div class="col-md-6">

              <div class="form-group">
              {!! Form::label('pangkat_golongan_ruang', 'Pangkat - Gol/Ruang') !!}
              {!! Form::text('pangkat_golongan_ruang', Input::old('pangkat_golongan_ruang'), array('class' => 'form-control')) !!}
              </div>

              <hr />

              <div class="form-inline">
              <div class="form-group">
                {!! Form::label('tmt_pangkat', 'TMT Pangkat:') !!}
								  @if($jabatan->tmt_pangkat <> NULL)
                		{!! Form::text('tmt_pangkat', date('d-m-Y', strtotime($jabatan->tmt_pangkat)), array('class' => 'form-control', 'id' => 'tmt_pangkat', 'aria-describedby' => 'inputDate')) !!}
									@else
								    {!! Form::text('tmt_pangkat', null, array('class' => 'form-control', 'id' => 'tmt_pangkat')) !!}
								  @endif
								{!! Form::label('masa_kerja', 'Masa Kerja:') !!}
                {!! Form::text('masakerja_tahun', Input::old('masakerja_tahun'), array('class' => 'form-control', 'size' => '2')) !!}
                {!! Form::label('tahun', 'Tahun') !!}
                {!! Form::text('masakerja_bulan', Input::old('masakerja_bulan'), array('class' => 'form-control', 'size' => '2')) !!}
                {!! Form::label('bulan', 'Bulan') !!}
              </div>
            </div>

            <hr />

            <div class="form-group">
            {!! Form::label('pendidikan_terakhir', 'Pendidikan Terakhir') !!}
            {!! Form::text('pendidikan_terakhir', Input::old('pendidikan_terakhir'), array('class' => 'form-control')) !!}
            </div>

            </div>


          </div>
          {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
