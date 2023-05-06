<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoFormularioRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'mensaje_asunto'=> 'required|string',
            'nombre' => 'required|string',
            'email' => 'required|email',
            'mensaje' => 'string',
        ];
    }
}