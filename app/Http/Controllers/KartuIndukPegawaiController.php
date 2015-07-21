<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\KartuIndukPegawai;
use Input, Session, Redirect, Response;
use App\Http\Requests\KartuIndukPegawaiRequest;
use Image;

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
        $kartu_induk_pegawais = KartuIndukPegawai::all();
        return view('kartu-induk-pegawai.index', [ 'kartu_induk_pegawai' => $kartu_induk_pegawais]);
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
      $image = $request->file('foto');
      if(!empty($image)) {
        $fotoName = 'peg' . $kartu_induk_pegawais->id . '.' .
        $request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->move(
        base_path() . '/public/images/pegawai/', $fotoName
        );
        $img = Image::make(base_path() . '/public/images/pegawai/' . $fotoName);
        $img->resize(100, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->save();
        $kartu_induk_pegawai_fotos = KartuIndukPegawai::find($kartu_induk_pegawais->id);
        $kartu_induk_pegawai_fotos->foto = $fotoName;
        $kartu_induk_pegawai_fotos->save();
      }

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
        //
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
      $image = $request->file('foto');
      if(!empty($image)) {
        $fotoName = 'peg' . $kartu_induk_pegawais->id . '.' .
        $request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->move(
        base_path() . '/public/images/pegawai/', $fotoName
        );
        $img = Image::make(base_path() . '/public/images/pegawai/' . $fotoName);
        $img->resize(100, null, function ($constraint) {
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
}
