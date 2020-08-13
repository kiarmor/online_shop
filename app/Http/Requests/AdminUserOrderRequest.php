<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserOrderRequest extends FormRequest
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
        $id = $_POST['id'];
        return [
            'name' => 'min:3|max:25|required|string',
            'email' => [
                'required',
                'string',
                'email',
                'max:100',
                \Illuminate\Validation\Rule::unique('users')->ignore($id)
            ],
            'password' => 'min:6|required',
            'password_confirmation' => 'min:6|same:password'

        ];
    }
}
