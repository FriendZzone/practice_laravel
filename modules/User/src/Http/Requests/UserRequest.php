<?php

namespace Modules\User\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $id = $this->route()->id;
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'group_id' => ['required', 'integer', function ($attr, $value, $fail) {
                if (!(int)$value) {
                    $fail('select group');
                }
            }]
        ];
        if ($id) {
            $rules['email'] = "required|email|unique:users,email,$id";
            if ($this->password) {
                $rules['password'] = "min|5";
            } else {
                unset($rules['password']);
            }
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'require' => ':attribute is required',
            'email' => ':attribute must be a valid email address',
            'unique' => ':attribute must be unique',
            'min' => ':attribute must be at least :min character',
            'integer' => ':attribute must be a number'
        ];
    }
    public function attributes()
    {
        return [];
    }
}
