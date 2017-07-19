<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\KartuIndukPegawai, App\RiwayatPendidikan;
use Input, Session, Redirect, Response;
use App\Http\Requests\RiwayatPendidikanRequest;

class RiwayatPendidikanController extends Controller
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
        $riwayat_pendidikans = RiwayatPendidikan::where('kartu_induk_pegawai_id', Session::get('ids'))->get();
        return view('riwayat-pendidikan.index', [ 'riwayat_pendidikan' => $riwayat_pendidikans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('riwayat-pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RiwayatPendidikanRequest $request)
    {
      $riwayat_pendidikans = new RiwayatPendidikan;
      $riwayat_pendidikans->kartu_induk_pegawai_id = Input::get('ids');
      $riwayat_pendidikans->nama_sekolah = Input::get('nama_sekolah');
      $riwayat_pendidikans->tingkat = Input::get('tingkat');
      $riwayat_pendidikans->fakultas = Input::get('fakultas');
      $riwayat_pendidikans->akta = Input::get('akta', 'N');
      $riwayat_pendidikans->jurusan = Input::get('jurusan');
      $riwayat_pendidikans->tahun_lulus = Input::get('tahun_lulus');
      $riwayat_pendidikans->lokasi_sekolah = Input::get('lokasi_sekolah');
      $riwayat_pendidikans->save();
      Session::flash('message', 'Menambah data riwayat pendidikan, Berhasil');
      return Redirect::to('riwayat-pendidikan');
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
      $riwayat_pendidikans = RiwayatPendidikan::find($id);
      return view('riwayat-pendidikan.edit', [
        'riwayat_pendidikan' => $riwayat_pendidikans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(RiwayatPendidikanRequest $request, $id)
    {
        $riwayat_pendidikans = RiwayatPendidikan::find($id);
        $riwayat_pendidikans->nama_sekolah = Input::get('nama_sekolah');
        $riwayat_pendidikans->tingkat = Input::get('tingkat');
        $riwayat_pendidikans->fakultas = Input::get('fakultas');
        $riwayat_pendidikans->akta = Input::get('akta', 'N');
        $riwayat_pendidikans->jurusan = Input::get('jurusan');
        $riwayat_pendidikans->tahun_lulus = Input::get('tahun_lulus');
        $riwayat_pendidikans->lokasi_sekolah = Input::get('lokasi_sekolah');
        $riwayat_pendidikans->save();
        Session::flash('message', 'Mengganti data riwayat pendidikan, Berhasil');
        return Redirect::to('riwayat-pendidikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $riwayat_pendidikans = RiwayatPendidikan::find($id);
      $riwayat_pendidikans->delete();
      Session::flash('message', 'Menghapus Riwayat Pendidikan Sukses');
      return Redirect::to('riwayat-pendidikan');
    }
}
