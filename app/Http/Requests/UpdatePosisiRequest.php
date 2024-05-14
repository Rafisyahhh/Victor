<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePosisiRequest extends FormRequest
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
            //'nama_posisi'=> 'required|unique:posisis,nama_posisi',
        ];
    }
    public function messages(): array
    {
        return [
            'nama_posisi.required' => 'Posisi harus diisi',
            'nama_posisi.unique' => 'Posisi sudah ada',
        ];
    }
}
