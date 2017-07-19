<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RiwayatJabatan;
use Input, Session, Redirect, Response;
use App\Http\Requests\RiwayatJabatanRequest;

class RiwayatJabatanController extends Controller
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
      $riwayat_jabatans = RiwayatJabatan::where('kartu_induk_pegawai_id', Session::get('ids'))->get();
      return view('riwayat-jabatan.index', [ 'riwayat_jabatan' => $riwayat_jabatans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('riwayat-jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RiwayatJabatanRequest $request)
    {
      $riwayat_jabatans = new RiwayatJabatan;
      $riwayat_jabatans->kartu_induk_pegawai_id = Input::get('ids');
      $riwayat_jabatans->jabatan_utama = Input::get('jabatan_utama');
      $riwayat_jabatans->bidang_studi_mata_kuliah = Input::get('bidang_studi_mata_kuliah');
      $riwayat_jabatans->unit_kerja = Input::get('unit_kerja');
      $riwayat_jabatans->no_sk = Input::get('no_sk');
      $riwayat_jabatans->tgl_sk = date("Y-m-d", strtotime(Input::get('tgl_sk')));
      $riwayat_jabatans->tmt_sk = date("Y-m-d", strtotime(Input::get('tmt_sk')));
      $riwayat_jabatans->keterangan_jabatan = Input::get('keterangan_jabatan');
      $riwayat_jabatans->golongan_pangkat = Input::get('golongan_pangkat');
      $riwayat_jabatans->save();
      Session::flash('message', 'Menambah data riwayat jabatan, Berhasil');
      return Redirect::to('riwayat-jabatan');
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
      $riwayat_jabatans = RiwayatJabatan::find($id);
      return view('riwayat-jabatan.edit', [
        'riwayat_jabatan' => $riwayat_jabatans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(RiwayatJabatanRequest $request, $id)
    {
      $riwayat_jabatans = RiwayatJabatan::find($id);
      $riwayat_jabatans->jabatan_utama = Input::get('jabatan_utama');
      $riwayat_jabatans->bidang_studi_mata_kuliah = Input::get('bidang_studi_mata_kuliah');
      $riwayat_jabatans->unit_kerja = Input::get('unit_kerja');
      $riwayat_jabatans->no_sk = Input::get('no_sk');
      $riwayat_jabatans->tgl_sk = date("Y-m-d", strtotime(Input::get('tgl_sk')));
      $riwayat_jabatans->tmt_sk = date("Y-m-d", strtotime(Input::get('tmt_sk')));
      $riwayat_jabatans->keterangan_jabatan = Input::get('keterangan_jabatan');
      $riwayat_jabatans->golongan_pangkat = Input::get('golongan_pangkat');
      $riwayat_jabatans->save();
      Session::flash('message', 'Mengganti data riwayat jabatan, Berhasil');
      return Redirect::to('riwayat-jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $riwayat_jabatans = RiwayatJabatan::find($id);
      $riwayat_jabatans->delete();
      Session::flash('message', 'Menghapus Riwayat Jabatan Sukses');
      return Redirect::to('riwayat-jabatan');
    }
}
