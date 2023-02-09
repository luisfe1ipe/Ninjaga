<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreUpdateRequest extends FormRequest
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
            'user' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'photo' => 'image|file',
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'O campo usuário é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.unique' => 'O e-mail digitado já está registrado.',
            'password.required' => 'O campo senha é obrigatório.'
        ];
    }
}
