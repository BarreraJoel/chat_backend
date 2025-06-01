<?php

namespace App\Http\Requests\Api\v1;

use App\Classes\Api\v1\FormRequestHandler;

class RegisterRequest extends FormRequestHandler
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|password|confirmed|min:8|max:8',
            'image' => 'image'
        ];
    }
}
