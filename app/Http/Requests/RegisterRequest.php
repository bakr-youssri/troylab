<?php

namespace App\Http\Requests;

use App\Rules\MobileNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

    protected function onCreate(){
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    protected function onUpdate(){
        return [
            'name' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return request()->isMethod('post')?$this->onCreate():$this->onUpdate();
    }
}
