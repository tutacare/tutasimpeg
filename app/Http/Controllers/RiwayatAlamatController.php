<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RiwayatAlamat;
use Input, Session, Redirect, Response;
use App\Http\Requests\RiwayatAlamatRequest;

class RiwayatAlamatController extends Controller
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
      $riwayat_alamats = RiwayatAlamat::all();
      return view('riwayat-alamat.index', [ 'riwayat_alamat' => $riwayat_alamats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('riwayat-alamat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RiwayatAlamatRequest $request)
    {
      $riwayat_alamats = new RiwayatAlamat;
      $riwayat_alamats->kartu_induk_pegawai_id = Input::get('ids');
      $riwayat_alamats->alamat = Input::get('alamat');
      $riwayat_alamats->telepon = Input::get('telepon');
      $riwayat_alamats->kabupaten_kota = Input::get('kabupaten_kota');
      $riwayat_alamats->provinsi = Input::get('provinsi');
      $riwayat_alamats->kode_pos = Input::get('kode_pos');
      $riwayat_alamats->save();
      Session::flash('message', 'Menambah data Riwayat Alamat, Berhasil');
      return Redirect::to('riwayat-alamat');
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
      $riwayat_alamats = RiwayatAlamat::find($id);
      return view('riwayat-alamat.edit', [
        'riwayat_alamat' => $riwayat_alamats
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(RiwayatAlamatRequest $request, $id)
    {
      $riwayat_alamats = RiwayatAlamat::find($id);
      $riwayat_alamats->alamat = Input::get('alamat');
      $riwayat_alamats->telepon = Input::get('telepon');
      $riwayat_alamats->kabupaten_kota = Input::get('kabupaten_kota');
      $riwayat_alamats->provinsi = Input::get('provinsi');
      $riwayat_alamats->kode_pos = Input::get('kode_pos');
      $riwayat_alamats->save();
      Session::flash('message', 'Mengganti data Riwayat Alamat, Berhasil');
      return Redirect::to('riwayat-alamat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $riwayat_alamats = RiwayatAlamat::find($id);
      $riwayat_alamats->delete();
      Session::flash('message', 'Menghapus Riwayat Alamat Sukses');
      return Redirect::to('riwayat-alamat');
    }
}
