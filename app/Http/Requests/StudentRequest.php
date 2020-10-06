<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:180',
            ],
            'patronymic' => [
                'required',
                'string',
                'max:180',
            ],
            'surname' => [
                'required',
                'string',
                'max:180',
            ],
            'date_of_birth' => [
                'required',
            ],
            'group_id' => [
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
            'group_id.required' => 'The group field is required.',
        ];
    }
}
