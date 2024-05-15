<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerusahaanRequest extends FormRequest
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
            'nama_perusahaan' => 'required|unique:perusahaans,nama_perusahaan',
            'nama_kategori' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'no_telp' => 'required|numeric|unique:perusahaans,no_telp',
            'deskripsi' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'nama_perusahaan.required' => 'perusahaan harus diisi',
            'nama_perusahaan.unique' => 'Perusahaan sudah ada',
            'nama_kategori.required' => 'Kategori harus diisi',
            'foto.required' => 'Form tidak boleh kosong',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format file gambar harus jpeg, png, atau jpg',
            'no_telp.required' => 'Form tidak boleh kosong',
            'no_telp.digits_between' => 'No Telp harus 10-12 angka',
            'no_telp.unique' => 'No Telp sudah digunakan',
            'deskripsi.required' => 'Deskripsi harus diisi',
        ];
    }
}
