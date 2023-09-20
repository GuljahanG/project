<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:3|max:40',
            'surname' => 'required|min:3|max:40',
            'phone' => 'required|regex:/^\\+7\\d{10}$/',
            'avatar' => 'required|file|mimes:jpg,png|max:2048',
            'password' => 'required|min:8|max:40'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'surname.required' => 'Surname is required!',
            'phone.required' => 'Phone is required!',
            'avatar.required' => 'Avatar is required!'
        ];
    }
}
