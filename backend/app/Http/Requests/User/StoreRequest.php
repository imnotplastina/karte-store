<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'password' => 'required|string|confirmed',
            'email' => 'required|string|unique:users,email',
            'patronymic' => 'nullable|string',
            'age' => 'nullable|integer',
            'address' => 'nullable|string',
            'gender' => 'nullable|integer'
        ];
    }
}
