@extends('print-app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Kartu Induk Pegawai</div>
				<div class="panel-body">

          <div class="row">
						<div class="col-md-12">
        <table width="100%">
					<tr><td width="5%"><h4>NIP</h4></td><td width="5%"><h4>:</h4></td><td width="70%"><h4>{{$kartu_induk_pegawai->nip}}</h4></td><td width="20%" rowspan="2"><img src="/images/pegawai/{{$kartu_induk_pegawai->foto}}" /></td></tr>
					<tr><td width="5%"><h4>Nama</h4></td><td width="5%"><h4>:</h4></td><td width="70%"><h4>{{$kartu_induk_pegawai->nama_lengkap}}</h4></td></tr>
        </table>
						</div>
			</div>
    <br />
<table class="table table-striped">
  <tr><td><strong>Karpeg:</strong></td><td>{{$kartu_induk_pegawai->karpeg}}</td><td><strong>Karis/Karsu:</strong></td><td>{{$kartu_induk_pegawai->karis_karsu}}</td></tr>
  <tr><td><strong>Tempat Lahir:</strong></td><td>{{$kartu_induk_pegawai->tempat_lahir}}</td><td><strong>Tanggal Lahir:</strong></td><td>{{ date('d-m-Y', strtotime($kartu_induk_pegawai->tgl_lahir)) }}</td></tr>
  <tr><td><strong>Jenis Kelamin:</strong></td><td>{{$kartu_induk_pegawai->jenis_kelamin}}</td><td><strong>Status Perkawinan:</strong></td> <td>{{$kartu_induk_pegawai->status_perkawinan}}</td></tr>
  <tr><td><strong>Masuk Pegawai:</strong></td><td>{{ date('d-m-Y', strtotime($kartu_induk_pegawai->tgl_masuk_pegawai)) }}</td><td><strong>Status Kepegawaian:</strong></td><td>{{$kartu_induk_pegawai->status_kepegawaian}}</td></tr>
  <tr><td><strong>Agama:</strong></td><td>{{$kartu_induk_pegawai->agama}}</td><td><strong>Tanggal Pensiun:</strong></td><td>{{ date('d-m-Y', strtotime($kartu_induk_pegawai->tgl_pensiun)) }}</td></tr>
</table>

<hr />
<h4>Jabatan</h4>
<table class="table table-striped">
  <tr><td><strong>Jabatan:</strong></td><td>{{$jabatan->jabatan}}</td><td><strong>Unit Kerja:</strong></td><td>{{$jabatan->unit_kerja}}</td></tr>
  <tr><td><strong>Keterangan Unit Kerja:</strong></td><td>{{$jabatan->keterangan_unit_kerja}}</td><td><strong>Pangkat - Gol/Ruang:</strong></td><td>{{$jabatan->pangkat_golongan_ruang}}</td></tr>
  <tr><td><strong>TMT. Pangkat:</strong></td><td>{{ date('d-m-Y', strtotime($jabatan->tmt_pangkat)) }}</td><td><strong>Masa Kerja:</strong></td><td>{{$jabatan->masakerja_tahun}} Tahun {{$jabatan->masakerja_bulan}} Bulan</td></tr>
  <tr><td><strong>Pendidikan Terakhir:</strong></td><td>{{$jabatan->pendidikan_terakhir}}</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>

<hr />
<h4>Riwayat Pendidikan</h4>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td><small>Nama Sekolah</small></td>
              <td><small>Tingkat</small></td>
              <td><small>Fakultas</small></td>
              <td><small>Jurusan</small></td>
              <td><small>Tahun</small></td>
              <td><small>Akta</small></td>
              <td><small>Lokasi Sekolah</small></td>
          </tr>
      </thead>
      <tbody>
        @foreach($riwayat_pendidikan as $value)
            <tr>
                <td><small>{{ $value->nama_sekolah }}</small></td>
                <td><small>{{ $value->tingkat }}</small></td>
                <td><small>{{ $value->fakultas }}</small></td>
                <td><small>{{ $value->jurusan }}</small></td>
                <td><small>{{ $value->tahun_lulus }}</small></td>
                <td><small>{{ $value->akta }}</small></td>
                <td><small>{{ $value->lokasi_sekolah }}</small></td>
            </tr>
        @endforeach
      </tbody>
  </table>

<h4>Riwayat Pangkat</h4>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td><small>Golongan Pangkat</small></td>
              <td><small>No. SK</small></td>
              <td><small>TGL. SK</small></td>
              <td><small>TMT. SK</small></td>
              <td><small>Masa Kerja (Tahun)</small></td>
              <td><small>Masa Kerja (Bulan)</small></td>
              <td><small>Keterangan</small></td>
          </tr>
      </thead>
      <tbody>
        @foreach($riwayat_pangkat as $value)
            <tr>
                <td><small>{{ $value->golongan_pangkat }}</small></td>
                <td><small>{{ $value->no_sk }}</small></td>
                <td><small>{{ date('d-m-Y', strtotime($value->tgl_sk)) }}</small></td>
                <td><small>{{ date('d-m-Y', strtotime($value->tmt_sk)) }}</small></td>
                <td><small>{{ $value->masakerja_tahun }}</small></td>
                <td><small>{{ $value->masakerja_bulan }}</small></td>
                <td><small>{{ $value->keterangan }}</small></td>
            </tr>
        @endforeach
      </tbody>
  </table>
<h4>Riwayat Jabatan</h4>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td><small>Jabatan</small></td>
              <td><small>Satuan Kerja</small></td>
              <td><small>Bid. Studi/ Mata Kuliah</small></td>
              <td><small>No. SK</small></td>
              <td><small>TGL. SK</small></td>
              <td><small>TMT. SK</small></td>
              <td><small>Ket. Jabatan</small></td>
              <td><small>Gol. Pangkat</small></td>
          </tr>
      </thead>
      <tbody>
        @foreach($riwayat_jabatan as $value)
            <tr>
                <td><small>{{ $value->jabatan_utama }}</small></td>
                <td><small>{{ $value->bidang_studi_mata_kuliah }}</small></td>
                <td><small>{{ $value->unit_kerja }}</small></td>
                <td><small>{{ $value->no_sk }}</small></td>
                <td><small>{{ date('d-m-Y', strtotime($value->tgl_sk)) }}</small></td>
                <td><small>{{ date('d-m-Y', strtotime($value->tmt_sk)) }}</small></td>
                <td><small>{{ $value->keterangan_jabatan }}</small></td>
                <td><small>{{ $value->golongan_pangkat }}</small></td>
            </tr>
        @endforeach
      </tbody>
  </table>
<h4>Riwayat Diklat</h4>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td><small>Nama Diklat</small></td>
              <td><small>Diklat Lain</small></td>
              <td><small>Penyelenggara</small></td>
              <td><small>Tahun</small></td>
              <td><small>Bulan</small></td>
              <td><small>Hari</small></td>
              <td><small>Jam</small></td>
          </tr>
      </thead>
      <tbody>
        @foreach($riwayat_diklat as $value)
            <tr>
                <td><small>{{ $value->nama_diklat }}</small></td>
                <td><small>{{ $value->diklat_lain }}</small></td>
                <td><small>{{ $value->penyelenggara_diklat }}</small></td>
                <td><small>{{ $value->tahun_penyelenggaraan }}</small></td>
                <td><small>{{ $value->lama_diklat_bulan }}</small></td>
                <td><small>{{ $value->lama_diklat_hari }}</small></td>
                <td><small>{{ $value->lama_diklat_jam }}</small></td>
            </tr>
        @endforeach
      </tbody>
  </table>
<h4>Riwayat Suami/Istri</h4>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td><small>Nama</small></td>
              <td><small>TGL. Lahir</small></td>
              <td><small>TGL. Nikah</small></td>
              <td><small>TGL. Pisah</small></td>
              <td><small>Pekerjaan</small></td>
          </tr>
      </thead>
      <tbody>
        @foreach($riwayat_suami_istri as $value)
            <tr>
                <td><small>{{ $value->nama }}</small></td>
                <td><small>{{ date('d-m-Y', strtotime($value->tgl_lahir)) }}</small></td>
                <td><small>{{ date('d-m-Y', strtotime($value->tgl_nikah)) }}</small></td>
                @if($value->tgl_pisah <> NULL)
                <td><small>{{ date('d-m-Y', strtotime($value->tgl_pisah)) }}</small></td>
                @else
                <td>&nbsp;</td>
                @endif
                <td><small>{{ $value->pekerjaan }}</small></td>
            </tr>
        @endforeach
      </tbody>
  </table>
<h4>Riwayat Anak</h4>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td><small>Nama</small></td>
              <td><small>Jenis Kelamin</small></td>
              <td><small>TGl. Lahir</small></td>
              <td><small>Status Anak</small></td>
              <td><small>Keterangan</small></td>
          </tr>
      </thead>
      <tbody>
        @foreach($riwayat_anak as $value)
            <tr>
                <td><small>{{ $value->nama }}</small></td>
                <td><small>{{ $value->jenis_kelamin }}</small></td>
                <td><small>{{ date('d-m-Y', strtotime($value->tgl_lahir)) }}</small></td>
                <td><small>{{ $value->status_anak }}</small></td>
                <td><small>{{ $value->keterangan }}</small></td>
            </tr>
        @endforeach
      </tbody>
  </table>
<h4>Riwayat Alamat</h4>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td><small>Alamat</small></td>
              <td><small>Telepon</small></td>
              <td><small>Kabupaten/Kota</small></td>
              <td><small>Provinsi</small></td>
              <td><small>Kode Pos</small></td>
          </tr>
      </thead>
      <tbody>
        @foreach($riwayat_alamat as $value)
            <tr>
                <td><small>{{ $value->alamat }}</small></td>
                <td><small>{{ $value->telepon }}</small></td>
                <td><small>{{ $value->kabupaten_kota }}</small></td>
                <td><small>{{ $value->provinsi }}</small></td>
                <td><small>{{ $value->kode_pos }}</small></td>
            </tr>
        @endforeach
      </tbody>
  </table>

  <div class="pull-right">
  <button type="button" onclick="printSimpeg()" class="btn btn-info pull-right hidden-print">Print</button>
  </div>

</div>


				</div>
			</div>
		</div>
	</div>
  <script>
  function printSimpeg() {
      window.print();
  }
  </script>
@endsection
