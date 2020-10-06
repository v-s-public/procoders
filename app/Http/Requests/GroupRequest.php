<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GroupRequest extends FormRequest
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
        return [
            'group_number' => [
                'required',
                'integer',
                'max:255',
                Rule::unique('groups', 'group_number')->ignore($this->group, 'group_id')
            ],
            'course' => [
                'required',
                'integer',
            ],
            'faculty_id' => [
                'required',
                'integer',
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'faculty_id.required' => 'The faculty field is required.',
        ];
    }
}
