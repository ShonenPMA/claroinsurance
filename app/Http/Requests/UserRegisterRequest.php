<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|confirmed|regex:((?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*\W)\w.{6,18}\w)',
            'name' => 'required|max:100',
            'phone' => 'max:10',
            'card' => 'required|max:11',
            'birth_date' => 'required|date|before:-18 years',
            'city' => 'required|integer'

        ];
    }

    public function messages()
    {
       return  [
           'password.regex' => ' La clave debe tener mínimo un número, una letra mayúscula, una minúscula y un carácter especial',
           'birth_date.before' => ' Debes tener al menos 18 años'
        ];
    }
}
