<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorekategoriRequest extends FormRequest
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
            'nama_kategori'=>'required|unique:kategoris,nama_kategori'
        ];
    }
    public function messages()
    {
        return[
            'nama_kategori.required'=>'nama kategori tidak boleh kosong',
            'nama_kategori.unique'=>'nama sudah di gunakan',    
        ];
    }
}
