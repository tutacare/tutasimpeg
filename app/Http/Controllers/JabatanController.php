<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\KartuIndukPegawai, App\Jabatan;
use Input, Session, Redirect, Response;

class JabatanController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      //
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
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
      $jabatans = Jabatan::find($id);
      //$jabatans->kartu_induk_pegawai_id = Input::get('id');
      $jabatans->jabatan = Input::get('jabatan');
      $jabatans->unit_kerja = Input::get('unit_kerja');
      $jabatans->keterangan_unit_kerja = Input::get('keterangan_unit_kerja');
      $jabatans->pangkat_golongan_ruang = Input::get('pangkat_golongan_ruang');
      $jabatans->tmt_pangkat = date("Y-m-d", strtotime(Input::get('tmt_pangkat')));
      $jabatans->masakerja_tahun = Input::get('masakerja_tahun');
      $jabatans->masakerja_bulan = Input::get('masakerja_bulan');
      $jabatans->pendidikan_terakhir = Input::get('pendidikan_terakhir');
      $jabatans->save();
      $kartuindukpegawais = KartuIndukPegawai::find(Input::get('kartu_induk_pegawai_id'));
      Session::flash('message', 'Input Jabatan Pegawai NIP: ' . $kartuindukpegawais->nip . ' Sukses');
      return Redirect::to('kartu-induk-pegawai/' . Input::get('kartu_induk_pegawai_id') . '/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
