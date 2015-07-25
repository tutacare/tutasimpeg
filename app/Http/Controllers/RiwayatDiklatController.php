<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RiwayatDiklat;
use Input, Session, Redirect, Response;
use App\Http\Requests\RiwayatDiklatRequest;

class RiwayatDiklatController extends Controller
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
      $riwayat_diklats = RiwayatDiklat::all();
      return view('riwayat-diklat.index', [ 'riwayat_diklat' => $riwayat_diklats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('riwayat-diklat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RiwayatDiklatRequest $request)
    {
      $riwayat_diklats = new RiwayatDiklat;
      $riwayat_diklats->kartu_induk_pegawai_id = Input::get('ids');
      $riwayat_diklats->nama_diklat = Input::get('nama_diklat');
      $riwayat_diklats->diklat_lain = Input::get('diklat_lain');
      $riwayat_diklats->penyelenggara_diklat = Input::get('penyelenggara_diklat');
      $riwayat_diklats->tahun_penyelenggaraan = Input::get('tahun_penyelenggaraan');
      $riwayat_diklats->lama_diklat_bulan = Input::get('lama_diklat_bulan');
      $riwayat_diklats->lama_diklat_hari = Input::get('lama_diklat_hari');
      $riwayat_diklats->lama_diklat_jam = Input::get('lama_diklat_jam');
      $riwayat_diklats->save();
      Session::flash('message', 'Menambah data riwayat diklat, Berhasil');
      return Redirect::to('riwayat-diklat');
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
      $riwayat_diklats = RiwayatDiklat::find($id);
      return view('riwayat-diklat.edit', [
        'riwayat_diklat' => $riwayat_diklats
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(RiwayatDiklatRequest $request, $id)
    {
      $riwayat_diklats = RiwayatDiklat::find($id);
      $riwayat_diklats->nama_diklat = Input::get('nama_diklat');
      $riwayat_diklats->diklat_lain = Input::get('diklat_lain');
      $riwayat_diklats->penyelenggara_diklat = Input::get('penyelenggara_diklat');
      $riwayat_diklats->tahun_penyelenggaraan = Input::get('tahun_penyelenggaraan');
      $riwayat_diklats->lama_diklat_bulan = Input::get('lama_diklat_bulan');
      $riwayat_diklats->lama_diklat_hari = Input::get('lama_diklat_hari');
      $riwayat_diklats->lama_diklat_jam = Input::get('lama_diklat_jam');
      $riwayat_diklats->save();
      Session::flash('message', 'Mengganti data riwayat diklat, Berhasil');
      return Redirect::to('riwayat-diklat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $riwayat_diklats = RiwayatDiklat::find($id);
      $riwayat_diklats->delete();
      Session::flash('message', 'Menghapus Riwayat Diklat Sukses');
      return Redirect::to('riwayat-diklat');
    }
}
