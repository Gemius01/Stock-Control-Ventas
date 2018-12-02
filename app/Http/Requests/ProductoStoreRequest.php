<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoStoreRequest extends FormRequest
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
          'codigo' => 'required|max:100|min:2|unique:productos,codigo',
          'precio_costo' => 'required|max:20|min:1',
          'precio_venta' => 'required|max:20|min:1',
          'stock_critico' => 'required|max:20|min:1',
          'categoria_id' => 'required',
          
      ];
    }

    public function messages(){
      return [
          'nombre.required' => 'El nombre del producto esta vacío.',
          'nombre.max' => 'El nombre del producto no debe contener más de 100 caracteres.',
          'nombre.min' => 'El nombre del producto debe contener al menos 2 caracteres.',
          'codigo.required' => 'El codigo del producto esta vacío.',
          'codigo.max' => 'El codigo del producto no debe contener más de 100 caracteres.',
          'codigo.min' => 'El codigo del producto debe contener al menos 2 caracteres.',
          'codigo.unique' => 'El codigo del producto ya está registrado.',
          'precio_costo.required' => 'El costo del producto esta vacío.',
          'precio_costo.max' => 'El costo del producto no debe contener más de 100 digitos.',
          'precio_costo.min' => 'El costo del producto debe contener al menos 1 digto.',
          'precio_venta.required' => 'El precio del producto esta vacío.',
          'precio_venta.max' => 'El precio del producto no debe contener más de 100 digitos.',
          'precio_venta.min' => 'El precio del producto debe contener al menos 1 digto.',
          'stock_critico.required' => 'El Stock critico del producto esta vacío.',
          'stock_critico.max' => 'El Stock critico del producto no debe contener más de 100 digitos.',
          'stock_critico.min' => 'El Stock critico del producto debe contener al menos 1 digto.',
          'categoria_id.required' => 'Debe seleccionar alguna categoria.',
          
          
          
      ];
    }
}
