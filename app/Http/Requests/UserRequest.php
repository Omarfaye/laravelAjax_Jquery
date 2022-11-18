<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'prenom'=> $this->method() == 'POST' ?
                ['required', 'min:3' ] :
                ['required', 'min:3', Rule::unique('users', 'prenom')->ignore($this->user)], //cas ou on a un put et le champs existe deja on peut ne pas modifer pas forcement toutes les champs
            'nom'=> $this->method() == 'POST' ?
                ['required', 'min:2'] :
                ['required', 'min:2', Rule::unique('users', 'nom')->ignore($this->user)],
            'login'=> 'required|min:3|max:20|unique:users',
            'password'=> 'required|between:5,20',
        
        ];
    }
}
