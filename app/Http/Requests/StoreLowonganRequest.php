<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLowonganRequest extends FormRequest
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
            'nama_perusahaan' => 'required',
            'gaji' => 'required|numeric|min:0',
            'tempat_kerja' => 'required',
            'waktu_kerja' => 'required',
            'nama_posisi' => 'required',
            'ketentuan_kerja' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'nama_perusahaan.required' => 'perusahaan harus diisi',
            'gaji.required' => 'Gaji harus diisi',
            'gaji.min' => 'Gaji tidak boleh kurang dari 0',
            'tempat_kerja.required' => 'Tempat Kerja harus diisi',
            'waktu_kerja.required' => 'Waktu Kerja harus diisi',
            'nama_posisi.required' => 'Posisi harus diisi',
            'ketentuan_kerja.required' => 'Ketentuan Kerja harus diisi',
        ];
    }
}
