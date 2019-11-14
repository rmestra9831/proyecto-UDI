<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRadicadoRequest extends FormRequest
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
            'name'=>'required',
            'last_name'=>'required',
            'atention'=>'required',
            'program_id'=>'required|numeric',
            'sendTo_id'=>'required|numeric',
            'motivo_id'=>'required',
            'description'=>'alpha',
            'origen_cel'=>'required|max:14',
            'origen_correo'=>'email|required',
            'observaciones'=>'max:210',
            'type_motivo'=>'required',
        ];
        if ('motivo' == '') {
            # code...
        }
    }
    public function messages(){
        return [
            'name.required' => 'Este Campo es requerido',
            'last_name.required'  => 'Este Campo es requerido',
            'atention.required'  => 'Selecciona el tipo de atención requerida',
            'program_id.required'  => 'El campo PROGRAMA es obligatorio',
            'motivo_id.required'  => 'El campo MOTIVO es obligatorio',
            'origen_correo.required'  => 'El campo CORREO es obligatorio',
            'origen_cel.required'  => 'El campo de CELULAR es obligatorio',
            'description.required'  => 'Si seleccionaste "Otro" debes especificar ',
            'type_motivo.required'  => 'El campo MOTIVO/TIPO es obligatorio',
        ];
    }
}
