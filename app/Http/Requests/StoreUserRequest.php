<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('user_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> [
                'string',
                'unique:users',
            ],
            'email'=> [
                'required',
            ],
            'password'=> [
                'required',
            ],
            'roles.*'=> [
                'integer',
            ],
            'roles'=> [
                'required',
                'array',
            ],
        ];
    }
}
