<?php

namespace Ecommerce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
            'idusuario'=>'required',
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'cod_postal'=> 'required|numeric',
            'calle'=>'required|max:50',
            'numero'=>'numeric',
            'telefono'=>'max:15',
            'partido'=>'required|max:50',
            'localidad'=>'required|max:50',
        ];
    }
}
