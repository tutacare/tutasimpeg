<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class KartuIndukPegawaiRequest extends Request
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

      switch($this->method())
  {
      case 'GET':
      case 'DELETE':
      {
          return [];
      }
      case 'POST':
      {
        return [
            'nip' => 'required|unique:kartu_induk_pegawais',
            'karpeg' => 'required',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_masuk_pegawai' => 'required',
            'agama' => 'required',
            'karis_karsu' => 'required',
            'tgl_lahir' => 'required',
            'status_perkawinan' => 'required',
            'status_kepegawaian' => 'required',
            'jenis_kepegawaian' => 'required',
            'tgl_pensiun' => 'required',
            'foto' => 'mimes:jpeg,bmp,png|required'
        ];
      }
      case 'PUT':
        return [
            'nip' => 'required|unique:kartu_induk_pegawais,nip,' . $this->segment(2),
            'karpeg' => 'required',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_masuk_pegawai' => 'required',
            'agama' => 'required',
            'karis_karsu' => 'required',
            'tgl_lahir' => 'required',
            'status_perkawinan' => 'required',
            'status_kepegawaian' => 'required',
            'jenis_kepegawaian' => 'required',
            'tgl_pensiun' => 'required',
            'foto' => 'mimes:jpeg,bmp,png'
        ];
      case 'PATCH':
      default:break;
  }



    }

    public function messages()
    {
        return [
            'avatar.mimes' => 'Not a valid file type. Valid types include jpeg, bmp and png.'
        ];
    }
}
