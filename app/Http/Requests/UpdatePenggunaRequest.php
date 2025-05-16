<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePenggunaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nama' => 'required|string|max:100',
            'phone' => 'nullable|digits_between:10,13',
            'file_upload' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'=>'Nama tidak boleh kosong!',
            'email.required'=>'Email tidak boleh kosong!',
            'email.unique'=>'Email telah digunakan!',
            'password.required'=>'Password tidak boleh kosong!',
            'password.confirmation'=>'Password tidak cocok!',
            'file_upload.required' => 'File tidak boleh kosong'
        ];
    }
}
