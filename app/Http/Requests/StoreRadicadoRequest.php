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
            'atention'=>'required',
            'name'=>'required',
            'last_name'=>'required',
            'program_id'=>'required|numeric',
            'sendTo_id'=>'required|numeric',
            'motivo_id'=>'required',
            'description'=>'alpha',
            'origen_cel'=>'required|max:14',
            'origen_correo'=>'email|required',
            'observaciones'=>'max:210',
        ];
        if ('motivo' == '') {
            # code...
        }
    }
    public function messages(){
        return [
            'name.required' => 'Este Campo es requerido',
            'last_name.required'  => 'Este Campo es requerido',
            'atention.required'  => 'Por favor Selecciona el tipo de atenciòn',
        ];
    }
}
