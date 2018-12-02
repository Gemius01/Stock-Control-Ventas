<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaStoreRequest extends FormRequest
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
            'nombre' => 'required|max:50|min:2',
        ];
    }
    public function messages(){
        return [
            'nombre.required' => 'El nombre de la categoria esta vacío.',
            'nombre.max' => 'El nombre de la categoria no debe contener más de 100 caracteres.',
            'nombre.min' => 'El nombre de la categoria debe contener al menos 2 caracteres.',
        ];
      }
}
