<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\KartuIndukPegawai, App\Jabatan;
use Input, Session, Redirect;
use Excel;

class ImportFileController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function importFile()
    {
      return view('import-file.index');
    }
    public function uploadFile()
    {
      try
      {
        Excel::load(Input::file('file'), function($reader) {
          foreach ($reader->toObject() as $row)
          {
            if (KartuIndukPegawai::where('nip', $row->nip)->exists())
            {
              //do nothing;
            }
            else
            {
              $kartu_induk_pegawais = new KartuIndukPegawai;
              $kartu_induk_pegawais->nip = $row->nip;
              $kartu_induk_pegawais->karpeg = $row->karpeg;
              $kartu_induk_pegawais->karis_karsu = $row->karis_karsu;
              $kartu_induk_pegawais->nama_lengkap = $row->nama_lengkap;
              $kartu_induk_pegawais->tempat_lahir = $row->tempat_lahir;
              $kartu_induk_pegawais->tgl_lahir = date("Y-m-d", strtotime($row->tgl_lahir));
              $kartu_induk_pegawais->jenis_kelamin = $row->jenis_kelamin;
              $kartu_induk_pegawais->status_perkawinan = $row->status_perkawinan;
              $kartu_induk_pegawais->tgl_masuk_pegawai = date("Y-m-d", strtotime($row->tgl_masuk_pegawai));
              $kartu_induk_pegawais->status_kepegawaian = $row->status_kepegawaian;
              $kartu_induk_pegawais->agama = $row->agama;
              $kartu_induk_pegawais->jenis_kepegawaian = $row->jenis_kepegawaian;
              $kartu_induk_pegawais->tgl_pensiun = date("Y-m-d", strtotime($row->tgl_pensiun));
              $kartu_induk_pegawais->foto = 'no-foto.png';
              $kartu_induk_pegawais->save();
              //process jabatan
              $jabatans = new Jabatan;
              $jabatans->kartu_induk_pegawai_id = $kartu_induk_pegawais->id;
              $jabatans->tmt_pangkat = NULL;
              $jabatans->save();
            }
          }
        });
           Session::flash('message', 'Import File telah sukses.');
           return Redirect::to('import-file');
       }
       catch (\Exception $e)
       {
           Session::flash('message', 'Import File Error');//$e->getMessage()
           Session::flash('alert-class', 'alert-danger');
           return Redirect::to('import-file');
       }
    }
    public function downloadFile1()
    {
      return Redirect::to('/file/kartu-induk-pegawai.xlsx');
    }
}
