<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\KartuIndukPegawai;
use DB;
use Response;

class StatistikController extends Controller
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
      //$kartu_induk_pegawais = KartuIndukPegawai::select(DB::raw('count(*) as user_count, tgl_lahir'))
      //               ->groupBy('tgl_lahir')
      //               ->get();
      //YEAR(STR_TO_DATE(
      $kartu_induk_pegawais = KartuIndukPegawai::select(DB::raw('count(*) as pegawai_count, TIMESTAMPDIFF(YEAR,tgl_lahir,CURDATE()) as usia'))
                              ->orderBy('usia', 'asc')
                              ->groupBy('usia')
                              ->get();
      return view('statistik.index', [ 'kartu_induk_pegawai' => $kartu_induk_pegawais]);
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
        //
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

    public function pegawaiUsia()
    {

      return Response::json(KartuIndukPegawai::select(DB::raw('count(*) as pegawai_count, TIMESTAMPDIFF(YEAR,tgl_lahir,CURDATE()) as usia'))
                              ->orderBy('usia', 'asc')
                              ->groupBy('usia')
                              ->lists('usia'));
    }

    public function pegawaiUsiaCount()
    {
      return Response::json(KartuIndukPegawai::select(DB::raw('count(*) as pegawai_count, TIMESTAMPDIFF(YEAR,tgl_lahir,CURDATE()) as usia'))
                              ->orderBy('usia', 'asc')
                              ->groupBy('usia')
                              ->lists('pegawai_count'));
    }
}
