<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RiwayatPangkatRequest extends Request
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
          'golongan_pangkat' => 'required',
          'no_sk' => 'required',
          'tgl_sk' => 'required',
          'tmt_sk' => 'required',
          'masakerja_tahun' => 'required',
          'masakerja_bulan' => 'required'
        ];
    }
}
