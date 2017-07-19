<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JabatanRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'jabatan' => 'required',
          'unit_kerja' => 'required',
          'pangkat_golongan_ruang' => 'required',
          'tmt_pangkat' => 'required|date_format:"d-m-Y"',
          'masakerja_tahun' => 'required|numeric',
          'masakerja_bulan' => 'required|numeric'
        ];
    }
}
