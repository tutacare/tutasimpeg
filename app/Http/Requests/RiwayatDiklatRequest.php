<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RiwayatDiklatRequest extends Request
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
          'nama_diklat' => 'required',
          'penyelenggara_diklat' => 'required',
          'tahun_penyelenggaraan' => 'required|numeric',
          'lama_diklat_bulan' => 'numeric',
          'lama_diklat_hari' => 'numeric',
          'lama_diklat_jam' => 'numeric'
        ];
    }
}
