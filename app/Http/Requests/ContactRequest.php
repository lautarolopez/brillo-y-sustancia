<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'max:30|required',
            'email' => 'required|email',
            'message' => 'max:300|required'
        ];
    }

    public function messages()
    {
        return [
            'name.max:30' => 'Tu nombre es demasiado largo!',
            'name.required' => 'Necesitamos un nombre!',
            'email.required' => 'Necesitamos un email!',
            'email.email' => 'Eso no parece ser un correo electrónico',
            'message.max:300'  => 'El mensaje es demasiado largo!',
            'message.required' => 'Escribinos tu mensaje!',
        ];
    }
}
