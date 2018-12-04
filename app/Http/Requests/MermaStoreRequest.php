<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Producto;

class MermaStoreRequest extends FormRequest
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
    $producto= Producto::find($this->producto_id);

    if($producto!=null){
        return [
            'producto_id' => 'required',
            'cantidad' => 'required|numeric|max:'.$producto->stock.'|min:1',
            'motivo' => 'required|max:190|min:2',
        ];
    }
    else{
        return [
            'producto_id' => 'required',
            'cantidad' => 'required|max:10|min:1',
            'motivo' => 'required|max:190|min:2',
        ];
    }
      
    }

    public function messages(){
        $producto= Producto::find($this->producto_id);
        if($producto!=null){
            return [
                'producto_id.required' => 'Debe seleccionar algun producto.',
                'cantidad.required' => 'La cantidad de merma esta vacía.',
                'cantidad.max' => 'El maximo de stock es '.$producto->stock.' .',
                'cantidad.min' => 'La cantidad de merma debe contener al menos 1 digto.',
                'motivo.required' => 'El motivo de la merma esta vacío.',
                'motivo.max' => 'El motivo de la merma no debe contener más de 190 caracteres.',
                'motivo.min' => 'El motivo de la merma debe contener al menos 2 caracteres.',
              ];
        }

        else{
            return [
                'producto_id.required' => 'Debe seleccionar algun producto.',
                'cantidad.required' => 'La cantidad de merma esta vacía.',
                'cantidad.max' => 'El maximo de stock es **.',
                'cantidad.min' => 'La cantidad de merma debe contener al menos 1 digto.',
                'motivo.required' => 'El motivo de la merma esta vacío.',
                'motivo.max' => 'El motivo de la merma no debe contener más de 190 caracteres.',
                'motivo.min' => 'El motivo de la merma debe contener al menos 2 caracteres.',
              ];
        }
    
    }
}
