<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCvRequest extends FormRequest
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
            'cv' => 'required|file|mimes:pdf',
        ];
    }
    public function messages()
    {
        return[
            'cv.required'=>'CV tidak boleh kosong',  
            'cv.file'=>'CV harus berupa file',  
            'cv.mimes'=>'CV harus berbentuk pdf',  
        ];
    }
}