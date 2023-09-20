<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'company_id' => 'required|integer|exists:companies,id',
            'comment' => 'required|string|between:150,500',
            'rate' => 'required|integer|between:1,10',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'User is required!',
            'company_id.required' => 'Company is required!',
            'comment.required' => 'Comment is required!',
            'rate.required' => 'Rate is required!',
        ];
    }
}
