<?php

namespace App\Http\Requests\Api\v1;

use App\Classes\Api\v1\FormRequestHandler;
use Illuminate\Foundation\Http\FormRequest;

class StoreChatRequest extends FormRequestHandler
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
            'is_group' => 'required|boolean',
            'name' => 'nullable|string|min:2|max:20',
        ];
    }
}
