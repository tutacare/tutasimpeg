<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\KartuIndukPegawai, App\Jabatan;
use Excel;

class ExportFileController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function exportFile()
  {
    return view('export-file.index');
  }

  public function doExport()
  {
      Excel::create('tutasimpeg-kartu-induk-pegawai', function($excel) {
        // Set the title
        $excel->setTitle('tutasimpeg');
        // Chain the setters
        $excel->setCreator('Irfan Mahfudz Guntur')
              ->setCompany('Digital Tuta Network');
        // Call them separately
        $excel->setDescription('Export data kartu induk pegawai ke excel');

        $excel->sheet('KartuIndukPegawai', function ($sheet) {

        $sheet->row(1, array('Kartu Induk Pegawai'));

          $kartu_induk_pegawais = KartuIndukPegawai::all();

          $column = array(
                    'NIP',
                    'KARPEG',
                    'KARIS/KARSU',
                    'NAMA LENGKAP',
                    'TEMPAT LAHIR',
                    'TGL LAHIR',
                    'JENIS KELAMIN',
                    'STATUS PERKAWINAN',
                    'TGL MASUK PEGAWAI',
                    'STATUS KEPEGAWAIAN',
                    'AGAMA',
                    'JENIS KEPEGAWAIAN',
                    'TGL PENSIUN'
                    );

          $sheet->appendRow($column);

          // getting last row number (the one we already filled and setting it to bold
          $sheet->row($sheet->getHighestRow(), function ($row) {
              $row->setFontWeight('bold');
          });

          // putting customers data as next rows
          foreach ($kartu_induk_pegawais as $value) {
              $sheet->appendRow(array(
                  $value->nip,
                  $value->karpeg,
                  $value->karis_karsu,
                  $value->nama_lengkap,
                  $value->tempat_lahir,
                  date('d-m-Y', strtotime($value->tgl_lahir)),
                  $value->jenis_kelamin,
                  $value->status_perkawinan,
                  date('d-m-Y', strtotime($value->tgl_masuk_pegawai)),
                  $value->status_kepegawaian,
                  $value->agama,
                  $value->jenis_kepegawaian,
                  date('d-m-Y', strtotime($value->tgl_pensiun))
                ));
          }
        });

      })->export('xls');
  }

}
