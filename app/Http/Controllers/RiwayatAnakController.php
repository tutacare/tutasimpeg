<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RiwayatAnak;
use Input, Session, Redirect, Response;
use App\Http\Requests\RiwayatAnakRequest;

class RiwayatAnakController extends Controller
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
      $riwayat_anaks = RiwayatAnak::where('kartu_induk_pegawai_id', Session::get('ids'))->get();
      return view('riwayat-anak.index', [ 'riwayat_anak' => $riwayat_anaks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('riwayat-anak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RiwayatAnakRequest $request)
    {
      $riwayat_anaks = new RiwayatAnak;
      $riwayat_anaks->kartu_induk_pegawai_id = Input::get('ids');
      $riwayat_anaks->nama = Input::get('nama');
      $riwayat_anaks->jenis_kelamin = Input::get('jenis_kelamin');
      $riwayat_anaks->tgl_lahir = date("Y-m-d", strtotime(Input::get('tgl_lahir')));
      $riwayat_anaks->status_anak = Input::get('status_anak');
      $riwayat_anaks->keterangan = Input::get('keterangan');
      $riwayat_anaks->save();
      Session::flash('message', 'Menambah data Riwayat Anak, Berhasil');
      return Redirect::to('riwayat-anak');
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
      $riwayat_anaks = RiwayatAnak::find($id);
      return view('riwayat-anak.edit', [
        'riwayat_anak' => $riwayat_anaks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(RiwayatAnakRequest $request, $id)
    {
      $riwayat_anaks = RiwayatAnak::find($id);
      $riwayat_anaks->nama = Input::get('nama');
      $riwayat_anaks->jenis_kelamin = Input::get('jenis_kelamin');
      $riwayat_anaks->tgl_lahir = date("Y-m-d", strtotime(Input::get('tgl_lahir')));
      $riwayat_anaks->status_anak = Input::get('status_anak');
      $riwayat_anaks->keterangan = Input::get('keterangan');
      $riwayat_anaks->save();
      Session::flash('message', 'Mengganti data Riwayat Anak, Berhasil');
      return Redirect::to('riwayat-anak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $riwayat_anaks = RiwayatAnak::find($id);
      $riwayat_anaks->delete();
      Session::flash('message', 'Menghapus Riwayat Anak Sukses');
      return Redirect::to('riwayat-anak');
    }
}
