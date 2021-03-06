<?php

namespace App\Http\Requests;

use App\Helpers\IDGenerator;
use App\Models\Student;
use App\Rules\EmailRule;
use App\Rules\MobileNumberRule;
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
            'name'=>['required', 'min:3', 'max:150'],
            'email'=>['required',new EmailRule(),'unique:students,email,except'.$this->student? $this->id:''],
            'mob'=>['required', new MobileNumberRule(),'unique:students,mob,except'.$this->student? $this->id:''],
            'gender'=>['required', 'in:male,female'],
            'dob'=>['required', 'date_format:Y-m-d'],
            'level'=>['required', 'in:one,two,three'],
            'school_id'=>['required', 'exists:schools,id'],
            'enabled'=>['nullable', 'in:0,1']
        ];
    }
    public function messages()
    {
        return[
            'name.min' => 'Name values should contains 3 chars minimum',
            'name.max' => 'Name values should contains 150 chars maximum',
            'description.min' => 'Name values should contains 3 chars minimum',
            'gender.in' => 'Gender value is not matching',
            'dob.date_format' => 'DOB format is not matching',
            'level.in' => 'Level value is not matching',
            'enabled.in' => 'Enabled value not invalid'
        ];
    }
}
