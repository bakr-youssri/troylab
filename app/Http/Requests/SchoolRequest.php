<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'name'=>['required', 'min:3', 'max:150'],
            'description'=>['nullable', 'min:3'],
            'enabled'=>['nullable', 'in:0,1']
        ];
    }
    public function messages()
    {
        return[
            'name.min' => 'Name values should contains 3 chars minimum',
            'name.max' => 'Name values should contains 150 chars maximum',
            'description.min' => 'Name values should contains 3 chars minimum',
            'enabled.in' => 'Enabled value not invalid'
        ];
    }
}
