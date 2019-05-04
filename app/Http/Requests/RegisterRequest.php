<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'jk' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'email' => 'required|unique:users',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama kamu harus diisi',
            'jk.required' => 'Jenis kelamin harus diisi',
            'alamat.required' => 'Alamat kamu harus diisi',
            'no_telp.required' => 'Nomor telepon kamu harus diisi',
            'email.required' => 'Email kamu harus diisi',
            'email.unique' => 'Ups! Email sudah ada yang punya',
            'password.required' => 'Password kamu harus diisi',
        ];
    }
}
