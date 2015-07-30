@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Import File Excel</div>
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

        {!! Form::open(array('url' => 'upload-file', 'files' => true)) !!}
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('file', 'File Excel') !!}
              {!! Form::file('file', Input::old('file'), array('class' => 'form-control')) !!}
            </div>
						{!! Form::submit('Import Excel', array('class' => 'btn btn-primary')) !!}
		        {!! Form::close() !!}
          </div>

            <div class="col-md-8">
              Petunjuk Pengisian File Excel:
              <ul>
                <li><strong>TGl_LAHIR</strong> : dengan format <code>dd-mm-yyyy</code> contoh: 20-12-2015</li>
                <li><strong>JENIS_KELAMIN</strong> : dengan pilihan dan penulisan Pria / Wanita</li>
                <li><strong>TGL_MASUK_PEGAWAI</strong> : dengan format <code>dd-mm-yyyy</code> contoh: 20-12-2015</li>
								<li><strong>TGL_PENSIUN</strong> : dengan format <code>dd-mm-yyyy</code> contoh: 20-12-2015</li>
								<li>Rumus excel untuk menentukan TGL_PENSIUN : <code>=DATE(YEAR(F2)+55,MONTH(F2),DAY(F2))</code> dimana (F2) adalah kolom TGL_LAHIR</li>
              </ul>
              <a href="{{ url('/dlfile1') }}">Download Format File Kartu Induk Pegawai Excel</a>

            </div>
        </div>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
