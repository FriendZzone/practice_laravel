<?php

namespace Modules\Categories\src\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            //
            'name' => 'required|max:255',
            'slug' => 'required',
            'parent_id' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'required' => __('categories::validation.required'),
            'email' => __('categories::validation.email'),
            'unique' => __('categories::validation.unique'),
            'max' => __('categories::validation.max'),
            'integer' => __('categories::validation.integer')
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('categories::validation.attributes.name'),
            'slug' => __('categories::validation.attributes.password'),
            'parent_id' => __('categories::validation.attributes.group_id'),
        ];
    }
}
