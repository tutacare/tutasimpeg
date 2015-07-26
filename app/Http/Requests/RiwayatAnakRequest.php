<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RiwayatAnakRequest extends Request
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
          'nama' => 'required',
          'jenis_kelamin' => 'required',
          'tgl_lahir' => 'required|date_format:"d-m-Y"',
          'status_anak' => 'required'
        ];
    }
}
