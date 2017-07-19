<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\KartuIndukPegawai, App\Jabatan;
use App\RiwayatPendidikan, App\RiwayatPangkat;
use App\RiwayatJabatan, App\RiwayatDiklat;
use App\RiwayatSuamiIstri, App\RiwayatAnak;
use App\RiwayatAlamat;
use Input, Session, Redirect, Response;
use App\Http\Requests\KartuIndukPegawaiRequest;
use Image, Validator;

class KartuIndukPegawaiController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $kartu_induk_pegawais = KartuIndukPegawai::orderBy('nama_lengkap', 'asc')->paginate(30);
        return view('kartu-induk-pegawai.index', [
          'kartu_induk_pegawai' => $kartu_induk_pegawais,
          'page' => 'index',
          'query' => ''
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('kartu-induk-pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(KartuIndukPegawaiRequest $request)
    {
      $kartu_induk_pegawais = new KartuIndukPegawai;
      $kartu_induk_pegawais->nip = Input::get('nip');
      $kartu_induk_pegawais->karpeg = Input::get('karpeg');
      $kartu_induk_pegawais->karis_karsu = Input::get('karis_karsu');
      $kartu_induk_pegawais->nama_lengkap = Input::get('nama_lengkap');
      $kartu_induk_pegawais->tempat_lahir = Input::get('tempat_lahir');
      $kartu_induk_pegawais->tgl_lahir = date("Y-m-d", strtotime(Input::get('tgl_lahir')));
      $kartu_induk_pegawais->jenis_kelamin = Input::get('jenis_kelamin');
      $kartu_induk_pegawais->status_perkawinan = Input::get('status_perkawinan');
      $kartu_induk_pegawais->tgl_masuk_pegawai = date("Y-m-d", strtotime(Input::get('tgl_masuk_pegawai')));
      $kartu_induk_pegawais->status_kepegawaian = Input::get('status_kepegawaian');
      $kartu_induk_pegawais->agama = Input::get('agama');
      $kartu_induk_pegawais->jenis_kepegawaian = Input::get('jenis_kepegawaian');
      $kartu_induk_pegawais->tgl_pensiun = date("Y-m-d", strtotime(Input::get('tgl_pensiun')));
      $kartu_induk_pegawais->save();

      // process image
      if(Input::hasFile('foto')) {
        $fotoName = 'peg' . $kartu_induk_pegawais->id . '.' .
        $request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->move(
        base_path() . '/public/images/pegawai/', $fotoName
        );
        $img = Image::make(base_path() . '/public/images/pegawai/' . $fotoName);
        $img->resize(150, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->save();
        $kartu_induk_pegawai_fotos = KartuIndukPegawai::find($kartu_induk_pegawais->id);
        $kartu_induk_pegawai_fotos->foto = $fotoName;
        $kartu_induk_pegawai_fotos->save();
      }

      //process jabatan
      $jabatans = new Jabatan;
      $jabatans->kartu_induk_pegawai_id = $kartu_induk_pegawais->id;
      $jabatans->tmt_pangkat = NULL;
      $jabatans->save();

      Session::flash('message', 'Input Kartu Induk Pegawai NIP: ' . $kartu_induk_pegawais->nip . ' Sukses');
      return Redirect::to('kartu-induk-pegawai/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      $kartu_induk_pegawais = KartuIndukPegawai::find($id);
      $jabatans = Jabatan::where('kartu_induk_pegawai_id', $id)->first();
      $riwayat_pendidikans = RiwayatPendidikan::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_pangkats = RiwayatPangkat::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_jabatans = Riwayatjabatan::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_diklats = RiwayatDiklat::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_suami_istris = RiwayatSuamiIstri::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_anaks = RiwayatAnak::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_alamats = RiwayatAlamat::where('kartu_induk_pegawai_id', $id)->get();
      return view('kartu-induk-pegawai.show', [
        'kartu_induk_pegawai' => $kartu_induk_pegawais,
        'jabatan' => $jabatans,
        'riwayat_pendidikan' => $riwayat_pendidikans,
        'riwayat_pangkat' => $riwayat_pangkats,
        'riwayat_jabatan' => $riwayat_jabatans,
        'riwayat_diklat' => $riwayat_diklats,
        'riwayat_suami_istri' => $riwayat_suami_istris,
        'riwayat_anak' => $riwayat_anaks,
        'riwayat_alamat' => $riwayat_alamats
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
      $kartu_induk_pegawais = KartuIndukPegawai::find($id);
      return view('kartu-induk-pegawai.edit', [
        'kartuIndukPegawai' => $kartu_induk_pegawais
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(KartuIndukPegawaiRequest $request, $id)
    {
      $kartu_induk_pegawais = KartuIndukPegawai::find($id);
      $kartu_induk_pegawais->nip = Input::get('nip');
      $kartu_induk_pegawais->karpeg = Input::get('karpeg');
      $kartu_induk_pegawais->karis_karsu = Input::get('karis_karsu');
      $kartu_induk_pegawais->nama_lengkap = Input::get('nama_lengkap');
      $kartu_induk_pegawais->tempat_lahir = Input::get('tempat_lahir');
      $kartu_induk_pegawais->tgl_lahir = date("Y-m-d", strtotime(Input::get('tgl_lahir')));
      $kartu_induk_pegawais->jenis_kelamin = Input::get('jenis_kelamin');
      $kartu_induk_pegawais->status_perkawinan = Input::get('status_perkawinan');
      $kartu_induk_pegawais->tgl_masuk_pegawai = date("Y-m-d", strtotime(Input::get('tgl_masuk_pegawai')));
      $kartu_induk_pegawais->status_kepegawaian = Input::get('status_kepegawaian');
      $kartu_induk_pegawais->agama = Input::get('agama');
      $kartu_induk_pegawais->jenis_kepegawaian = Input::get('jenis_kepegawaian');
      $kartu_induk_pegawais->tgl_pensiun = date("Y-m-d", strtotime(Input::get('tgl_pensiun')));
      $kartu_induk_pegawais->save();

      // process image
      if(Input::hasFile('foto')) {
        $fotoName = 'peg' . $kartu_induk_pegawais->id . '.' .
        $request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->move(
        base_path() . '/public/images/pegawai/', $fotoName
        );
        $img = Image::make(base_path() . '/public/images/pegawai/' . $fotoName);
        $img->resize(150, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->save();
        $kartu_induk_pegawai_fotos = KartuIndukPegawai::find($kartu_induk_pegawais->id);
        $kartu_induk_pegawai_fotos->foto = $fotoName;
        $kartu_induk_pegawai_fotos->save();
      }

      Session::flash('message', 'Mengganti Kartu Induk Pegawai NIP: ' . Input::get('nip') . ' Sukses');
      return Redirect::to('kartu-induk-pegawai/'. $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $kartu_induk_pegawais = KartuIndukPegawai::find($id);
      $kartu_induk_pegawais->delete();
      Session::flash('message', 'Menghapus Kartu Induk Pegawai NIP: ' . $kartu_induk_pegawais->nip . ' Sukses');
      return Redirect::to('kartu-induk-pegawai');
    }

    public function getApi($id)
    {
      return Response::json(KartuIndukPegawai::find($id));
    }
    public function getApiAja()
    {
      return Response::json(KartuIndukPegawai::orderBy('id', 'desc')->get());
    }
    public function testing()
    {
      return view('testing');
    }

    public function search()
    {
      if(Input::has('q'))
      {
        $key = Input::get('q');
        $kartu_induk_pegawais = KartuIndukPegawai::where('nip', 'LIKE', '%'. $key .'%')
        ->orWhere('nama_lengkap', 'LIKE', '%'. $key .'%')
        ->orWhere('tempat_lahir', 'LIKE', '%'. $key .'%')
        ->orderBy('nama_lengkap', 'asc')
        ->paginate(30);
        return view('kartu-induk-pegawai.index', [
          'kartu_induk_pegawai' => $kartu_induk_pegawais,
          'page' => 'search',
          'query' => $key
          ]);
      }
      else
      {
        return Redirect::to('kartu-induk-pegawai');
      }
    }

    public function jabatan($id)
    {
      $kartu_induk_pegawais = KartuIndukPegawai::find($id);
      $jabatans = Jabatan::where('kartu_induk_pegawai_id', $id)->first();
      return view('kartu-induk-pegawai.jabatan', [
        'jabatan' => $jabatans,
        'kartu_induk_pegawai' => $kartu_induk_pegawais
        ]);
    }

    public function riwayat($id)
    {
      $kartu_induk_pegawais = KartuIndukPegawai::find($id);
      return view('kartu-induk-pegawai.riwayat', [
        'kartu_induk_pegawai' => $kartu_induk_pegawais
        ]);
    }

    public function cetak($id)
    {
      $kartu_induk_pegawais = KartuIndukPegawai::find($id);
      $jabatans = Jabatan::where('kartu_induk_pegawai_id', $id)->first();
      $riwayat_pendidikans = RiwayatPendidikan::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_pangkats = RiwayatPangkat::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_jabatans = Riwayatjabatan::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_diklats = RiwayatDiklat::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_suami_istris = RiwayatSuamiIstri::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_anaks = RiwayatAnak::where('kartu_induk_pegawai_id', $id)->get();
      $riwayat_alamats = RiwayatAlamat::where('kartu_induk_pegawai_id', $id)->get();
      return view('kartu-induk-pegawai.cetak', [
        'kartu_induk_pegawai' => $kartu_induk_pegawais,
        'jabatan' => $jabatans,
        'riwayat_pendidikan' => $riwayat_pendidikans,
        'riwayat_pangkat' => $riwayat_pangkats,
        'riwayat_jabatan' => $riwayat_jabatans,
        'riwayat_diklat' => $riwayat_diklats,
        'riwayat_suami_istri' => $riwayat_suami_istris,
        'riwayat_anak' => $riwayat_anaks,
        'riwayat_alamat' => $riwayat_alamats
        ]);
    }

    public function imageIndex()
    {
      $kartu_induk_pegawais = KartuIndukPegawai::find(Session::get('ids'));
      return view('image-kartu-induk-pegawai.edit', [
        'kartuIndukPegawai' => $kartu_induk_pegawais
        ]);
    }
    public function imageUpdate()
    {
      $rules = array(
			'foto' => 'mimes:jpeg,bmp,png|required'
			);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->fails())
			{
				 return Redirect::to('image-kartu-induk-pegawai')
				->withErrors($validator);
			} else {
          $id = Input::get('id');
          // process image
          if(Input::hasFile('foto')) {
            $fotoName = 'peg' . $id . '.' .
            Input::file('foto')->getClientOriginalExtension();
            Input::file('foto')->move(
            base_path() . '/public/images/pegawai/', $fotoName
            );
            $img = Image::make(base_path() . '/public/images/pegawai/' . $fotoName);
            $img->resize(150, null, function ($constraint) {
              $constraint->aspectRatio();
            });
            $img->save();
            $kartu_induk_pegawai_fotos = KartuIndukPegawai::find($id);
            $kartu_induk_pegawai_fotos->foto = $fotoName;
            $kartu_induk_pegawai_fotos->save();
          }

          Session::flash('message', 'Berhasil mengganti Foto');
          return Redirect::to('image-kartu-induk-pegawai');
      }
    }

}
