<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPDF extends FormRequest
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
            'filePDF'=>'mimes:pdf,pdx |required',
        ];
    }
    public function messages(){
        return [
            'filePDF.mimes' => 'Debe ser un archivo pdf',
            'filePDF.required' => 'El campo se encuentra vacio',
        ];
    }
}
