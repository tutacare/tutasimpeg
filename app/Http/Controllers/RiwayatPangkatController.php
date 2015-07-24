<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RiwayatPangkat;
use Input, Session, Redirect, Response;
use App\Http\Requests\RiwayatPangkatRequest;

class RiwayatPangkatController extends Controller
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
      $riwayat_pangkats = RiwayatPangkat::all();
      return view('riwayat-pangkat.index', [ 'riwayat_pangkat' => $riwayat_pangkats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('riwayat-pangkat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RiwayatPangkatRequest $request)
    {
      $riwayat_pangkats = new RiwayatPangkat;
      $riwayat_pangkats->kartu_induk_pegawai_id = Input::get('ids');
      $riwayat_pangkats->golongan_pangkat = Input::get('golongan_pangkat');
      $riwayat_pangkats->no_sk = Input::get('no_sk');
      $riwayat_pangkats->tgl_sk = date("Y-m-d", strtotime(Input::get('tgl_sk')));
      $riwayat_pangkats->tmt_sk = date("Y-m-d", strtotime(Input::get('tmt_sk')));
      $riwayat_pangkats->masakerja_tahun = Input::get('masakerja_tahun');
      $riwayat_pangkats->masakerja_bulan = Input::get('masakerja_bulan');
      $riwayat_pangkats->keterangan = Input::get('keterangan');
      $riwayat_pangkats->save();
      Session::flash('message', 'Menambah data riwayat pangkat, Berhasil');
      return Redirect::to('riwayat-pangkat');
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
      $riwayat_pangkats = RiwayatPangkat::find($id);
      return view('riwayat-pangkat.edit', [
        'riwayat_pangkat' => $riwayat_pangkats
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(RiwayatPangkatRequest $request, $id)
    {
      $riwayat_pangkats = RiwayatPangkat::find($id);
      $riwayat_pangkats->golongan_pangkat = Input::get('golongan_pangkat');
      $riwayat_pangkats->no_sk = Input::get('no_sk');
      $riwayat_pangkats->tgl_sk = date("Y-m-d", strtotime(Input::get('tgl_sk')));
      $riwayat_pangkats->tmt_sk = date("Y-m-d", strtotime(Input::get('tmt_sk')));
      $riwayat_pangkats->masakerja_tahun = Input::get('masakerja_tahun');
      $riwayat_pangkats->masakerja_bulan = Input::get('masakerja_bulan');
      $riwayat_pangkats->keterangan = Input::get('keterangan');
      $riwayat_pangkats->save();
      Session::flash('message', 'Mengganti data riwayat pangkat, Berhasil');
      return Redirect::to('riwayat-pangkat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $riwayat_pangkats = RiwayatPangkat::find($id);
      $riwayat_pangkats->delete();
      Session::flash('message', 'Menghapus Riwayat Pangkat Sukses');
      return Redirect::to('riwayat-pangkat');
    }
}
