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
            'name'=> $this->method() == 'POST' ?
                ['required', 'min:3', 'unique:users,name'] :
                ['required', 'min:3', Rule::unique('users', 'name')->ignore($this->user)], //cas ou on a un put et le champs existe deja on peut ne pas modifer pas forcement toutes les champs
            'email'=>'required|email|unique:users',
            'description' =>['required'],
            'password'=> 'required|between:5,20',
        
        ];
    }
}
