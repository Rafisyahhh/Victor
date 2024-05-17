<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class UpdatekategoriRequest extends FormRequest
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
    public function rules()
    {
            $id = Route::input('kategori');   

            return [
                'nama_kategori' => [
                    'required',
                    Rule::unique('kategoris', 'nama_kategori')->ignore($id),
                ],      
              ];
<<<<<<< Updated upstream
    }
    public function messages()
    {
        return[
            'nama_kategori.required'=>'nama kategori tidak boleh kosong',
            'nama_kategori.unique'=>'nama sudah di gunakan',    

        ];
    }
}      
=======
    }
    public function messages()
    {
        return[
            'nama_kategori.required'=>'nama kategori tidak boleh kosong',
            'nama_kategori.unique'=>'nama ketegori sudah di gunakan',    

        ];
    }
}
>>>>>>> Stashed changes
