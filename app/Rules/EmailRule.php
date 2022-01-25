<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Lang;

class EmailRule implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match("/^\S+@\S+\.\S+$/", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return Lang::get('validation.email');
    }
}
