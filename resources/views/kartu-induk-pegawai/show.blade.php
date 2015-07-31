@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Kartu Induk Pegawai</div>
				<div class="panel-body">
					{{Session::set('ids', $kartu_induk_pegawai->id)}}
          <div class="row">
						<div class="col-md-8">
        <table width="100%">
					<tr><td width="10%"><h3>NIP</h3></td><td width="5%"><h3>:</h3></td><td width="85%"><h3>{{$kartu_induk_pegawai->nip}}</h3></td></tr>
					<tr><td width="10%"><h3>Nama</h3></td><td width="5%"><h3>:</h3></td><td width="85%"><h3>{{$kartu_induk_pegawai->nama_lengkap}}</h3></td></tr>
				</table>
						</div>
						<div class="col-md-4">

					<div class="imgpegawai form-group pull-right">
						<img src="/images/pegawai/{{$kartu_induk_pegawai->foto}}" />
						<div> <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
							 Ganti Foto
						</button> </div>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Ganti Foto Pegawai</h4>
			      </div>
			      <div class="modal-body">
							  <img id="loader1" src="/images/tutasimpeg/Intersection.gif" width="100" height="100" alt="loading gif"/>
			        <iframe frameborder="0" width="100%" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);'></iframe>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- End Modal -->
<table class="table table-striped">
  <tr><td><strong>Karpeg:</strong></td><td>{{$kartu_induk_pegawai->karpeg}}</td><td><strong>Karis/Karsu:</strong></td><td>{{$kartu_induk_pegawai->karis_karsu}}</td><td><strong>Tempat Lahir:</strong></td><td>{{$kartu_induk_pegawai->tempat_lahir}}</td></tr>
  <tr><td><strong>Tanggal Lahir:</strong></td><td>{{ date('d-m-Y', strtotime($kartu_induk_pegawai->tgl_lahir)) }}</td><td><strong>Jenis Kelamin:</strong></td><td>{{$kartu_induk_pegawai->jenis_kelamin}}</td><td><strong>Status Perkawinan:</strong></td> <td>{{$kartu_induk_pegawai->status_perkawinan}}</td></tr>
  <tr><td><strong>Masuk Pegawai:</strong></td><td>{{ date('d-m-Y', strtotime($kartu_induk_pegawai->tgl_masuk_pegawai)) }}</td><td><strong>Status Kepegawaian:</strong></td><td>{{$kartu_induk_pegawai->status_kepegawaian}}</td><td><strong>Agama:</strong></td><td>{{$kartu_induk_pegawai->agama}}</td></tr>
	<tr><td><strong>Umur:</strong></td><td>{{Carbon::createFromDate(date('Y', strtotime($kartu_induk_pegawai->tgl_lahir)))->diff(Carbon::now())->format('%y Tahun')}}</td><td><strong>Tanggal Pensiun:</strong></td><td>{{ date('d-m-Y', strtotime($kartu_induk_pegawai->tgl_pensiun)) }}</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>

<hr />
<h3>Jabatan</h3>
<table class="table table-striped">
  <tr><td><strong>Jabatan:</strong></td><td>{{$jabatan->jabatan}}</td><td><strong>Unit Kerja:</strong></td><td>{{$jabatan->unit_kerja}}</td><td><strong>Keterangan Unit Kerja:</strong></td><td>{{$jabatan->keterangan_unit_kerja}}</td></tr>
  <tr><td><strong>Pangkat - Gol/Ruang:</strong></td><td>{{$jabatan->pangkat_golongan_ruang}}</td><td><strong>TMT. Pangkat:</strong></td><td>@if($jabatan->tmt_pangkat <> NULL) {{ date('d-m-Y', strtotime($jabatan->tmt_pangkat)) }} @else &nbsp; @endif</td><td><strong>Masa Kerja:</strong></td><td>{{$jabatan->masakerja_tahun}} Tahun {{$jabatan->masakerja_bulan}} Bulan</td></tr>
  <tr><td><strong>Pendidikan Terakhir:</strong></td><td>{{$jabatan->pendidikan_terakhir}}</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>

<hr />
<h3>Riwayat</h3>

<div>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a href="#pendidikan" aria-controls="pendidikan" role="tab" data-toggle="tab">Pendidikan</a></li>
<li role="presentation"><a href="#pangkat" aria-controls="pangkat" role="tab" data-toggle="tab">Pangkat</a></li>
<li role="presentation"><a href="#jabatan" aria-controls="jabatan" role="tab" data-toggle="tab">Jabatan</a></li>
<li role="presentation"><a href="#diklat" aria-controls="diklat" role="tab" data-toggle="tab">Diklat</a></li>
<li role="presentation"><a href="#suami_istri" aria-controls="suami_istri" role="tab" data-toggle="tab">Suami/Istri</a></li>
<li role="presentation"><a href="#anak" aria-controls="anak" role="tab" data-toggle="tab">Anak</a></li>
<li role="presentation"><a href="#alamat" aria-controls="alamat" role="tab" data-toggle="tab">Alamat</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

<div role="tabpanel" class="tab-pane active" id="pendidikan">
<p>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td>Nama Sekolah</td>
              <td>Tingkat</td>
              <td>Fakultas</td>
              <td>Jurusan</td>
              <td>Tahun</td>
              <td>Akta</td>
              <td>Lokasi Sekolah</td>
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
                <td>{{ $value->lokasi_sekolah }}</td>
            </tr>
        @endforeach
      </tbody>
  </table>
</p>
</div>
<div role="tabpanel" class="tab-pane" id="pangkat">
<p>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td>Golongan Pangkat</td>
              <td>No. SK</td>
              <td>TGL. SK</td>
              <td>TMT. SK</td>
              <td>Masa Kerja (Tahun)</td>
              <td>Masa Kerja (Bulan)</td>
              <td>Keterangan</td>
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
                <td>{{ $value->keterangan }}</td>
            </tr>
        @endforeach
      </tbody>
  </table>
</p>
</div>
<div role="tabpanel" class="tab-pane" id="jabatan">
<p>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td>Jabatan</td>
              <td>Satuan Kerja</td>
              <td>Bid. Studi/ Mata Kuliah</td>
              <td>No. SK</td>
              <td>TGL. SK</td>
              <td>TMT. SK</td>
              <td>Ket. Jabatan</td>
              <td>Gol. Pangkat</td>
          </tr>
      </thead>
      <tbody>
        @foreach($riwayat_jabatan as $value)
            <tr>
                <td>{{ $value->jabatan_utama }}</td>
                <td>{{ $value->bidang_studi_mata_kuliah }}</td>
                <td>{{ $value->unit_kerja }}</td>
                <td>{{ $value->no_sk }}</td>
                <td>{{ date('d-m-Y', strtotime($value->tgl_sk)) }}</td>
                <td>{{ date('d-m-Y', strtotime($value->tmt_sk)) }}</td>
                <td>{{ $value->keterangan_jabatan }}</td>
                <td>{{ $value->golongan_pangkat }}</td>
            </tr>
        @endforeach
      </tbody>
  </table>
</p>
</div>
<div role="tabpanel" class="tab-pane" id="diklat">
<p>
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
            </tr>
        @endforeach
      </tbody>
  </table>
</p>
</div>
<div role="tabpanel" class="tab-pane" id="suami_istri">
<p>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td>Nama</td>
              <td>TGL. Lahir</td>
              <td>TGL. Nikah</td>
              <td>TGL. Pisah</td>
              <td>Pekerjaan</td>
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
            </tr>
        @endforeach
      </tbody>
  </table>
</p>
</div>
<div role="tabpanel" class="tab-pane" id="anak">
<p>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td>Nama</td>
              <td>Jenis Kelamin</td>
              <td>TGl. Lahir</td>
              <td>Status Anak</td>
              <td>Keterangan</td>
          </tr>
      </thead>
      <tbody>
        @foreach($riwayat_anak as $value)
            <tr>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->jenis_kelamin }}</td>
                <td>{{ date('d-m-Y', strtotime($value->tgl_lahir)) }}</td>
                <td>{{ $value->status_anak }}</td>
                <td>{{ $value->keterangan }}</td>
            </tr>
        @endforeach
      </tbody>
  </table>
</p>
</div>
<div role="tabpanel" class="tab-pane" id="alamat">
<p>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td>Alamat</td>
              <td>Telepon</td>
              <td>Kabupaten/Kota</td>
              <td>Provinsi</td>
              <td>Kode Pos</td>
          </tr>
      </thead>
      <tbody>
        @foreach($riwayat_alamat as $value)
            <tr>
                <td>{{ $value->alamat }}</td>
                <td>{{ $value->telepon }}</td>
                <td>{{ $value->kabupaten_kota }}</td>
                <td>{{ $value->provinsi }}</td>
                <td>{{ $value->kode_pos }}</td>
            </tr>
        @endforeach
      </tbody>
  </table>
</p>
</div>
</div>

</div>

<div class="pull-right">
<a href="{{ URL::to('kartu-induk-pegawai/' . $kartu_induk_pegawai->id . '/cetak') }}" class="btn btn-primary" role="button">Cetak</a>
</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
