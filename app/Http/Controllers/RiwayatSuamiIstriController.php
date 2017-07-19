<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RiwayatSuamiIstri;
use Input, Session, Redirect, Response;
use App\Http\Requests\RiwayatSuamiIstriRequest;

class RiwayatSuamiIstriController extends Controller
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
      $riwayat_suami_istris = RiwayatSuamiIstri::where('kartu_induk_pegawai_id', Session::get('ids'))->get();
      return view('riwayat-suami-istri.index', [ 'riwayat_suami_istri' => $riwayat_suami_istris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('riwayat-suami-istri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RiwayatSuamiIstriRequest $request)
    {
      $riwayat_suami_istris = new RiwayatSuamiIstri;
      $riwayat_suami_istris->kartu_induk_pegawai_id = Input::get('ids');
      $riwayat_suami_istris->nama = Input::get('nama');
      $riwayat_suami_istris->tgl_lahir = date("Y-m-d", strtotime(Input::get('tgl_lahir')));
      $riwayat_suami_istris->tgl_nikah = date("Y-m-d", strtotime(Input::get('tgl_nikah')));
      if(Input::has('tgl_pisah')) {
        $riwayat_suami_istris->tgl_pisah = date("Y-m-d", strtotime(Input::get('tgl_pisah')));
      } else {
        $riwayat_suami_istris->tgl_pisah = NULL;
      }
      $riwayat_suami_istris->pekerjaan = Input::get('pekerjaan');
      $riwayat_suami_istris->save();
      Session::flash('message', 'Menambah data riwayat suami/istri, Berhasil');
      return Redirect::to('riwayat-suami-istri');
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
      $riwayat_suami_istris = RiwayatSuamiIstri::find($id);
      return view('riwayat-suami-istri.edit', [
        'riwayat_suami_istri' => $riwayat_suami_istris
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(RiwayatSuamiIstriRequest $request, $id)
    {
      $riwayat_suami_istris = RiwayatSuamiIstri::find($id);
      $riwayat_suami_istris->nama = Input::get('nama');
      $riwayat_suami_istris->tgl_lahir = date("Y-m-d", strtotime(Input::get('tgl_lahir')));
      $riwayat_suami_istris->tgl_nikah = date("Y-m-d", strtotime(Input::get('tgl_nikah')));
      if(Input::has('tgl_pisah')) {
        $riwayat_suami_istris->tgl_pisah = date("Y-m-d", strtotime(Input::get('tgl_pisah')));
      } else {
        $riwayat_suami_istris->tgl_pisah = NULL;
      }
      $riwayat_suami_istris->pekerjaan = Input::get('pekerjaan');
      $riwayat_suami_istris->save();
      Session::flash('message', 'Mengganti data riwayat Suami/Istri, Berhasil');
      return Redirect::to('riwayat-suami-istri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $riwayat_suami_istris = RiwayatSuamiIstri::find($id);
      $riwayat_suami_istris->delete();
      Session::flash('message', 'Menghapus Riwayat Suami/Istri Sukses');
      return Redirect::to('riwayat-suami-istri');
    }
}
