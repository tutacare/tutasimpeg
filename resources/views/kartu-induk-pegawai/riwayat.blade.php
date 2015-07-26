@extends('app')

@section('content')
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Riwayat Pegawai</div>
				<div class="panel-body">
          <h3>NIP: {{$kartu_induk_pegawai->nip}} - Nama: {{$kartu_induk_pegawai->nama_lengkap}}</h3><hr />
          {{Session::set('ids', $kartu_induk_pegawai->id)}}
          {!! Html::ul($errors->all()) !!}

					@if (Session::has('message'))
	        <div class="col-md-12">
						<div class="alert alert-info alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{{ Session::get('message') }}
						</div>
	        </div>
	        @endif

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
        <img id="loader1" src="/images/tutasimpeg/Intersection.gif" width="100" height="100" alt="loading gif"/>
        <iframe src="/riwayat-pendidikan" frameborder="0" width="100%" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);'></iframe>
      </p>
    </div>
    <div role="tabpanel" class="tab-pane" id="pangkat">
      <p>
        <iframe src="/riwayat-pangkat" frameborder="0" width="100%" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);'></iframe>
      </p>
    </div>
    <div role="tabpanel" class="tab-pane" id="jabatan">
      <p>
        <iframe src="/riwayat-jabatan" frameborder="0" width="100%" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);'></iframe>
      </p>
    </div>
    <div role="tabpanel" class="tab-pane" id="diklat">
      <p>
        <iframe src="/riwayat-diklat" frameborder="0" width="100%" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);'></iframe>
      </p>
    </div>
    <div role="tabpanel" class="tab-pane" id="suami_istri">
      <p>
        <iframe src="/riwayat-suami-istri" frameborder="0" width="100%" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);'></iframe>
      </p>
    </div>
    <div role="tabpanel" class="tab-pane" id="anak">
      <p>
        <iframe src="/riwayat-anak" frameborder="0" width="100%" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);'></iframe>
      </p>
    </div>
    <div role="tabpanel" class="tab-pane" id="alamat">Alamat</div>
  </div>

</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
