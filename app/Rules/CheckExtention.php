<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckExtention implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $type =strtolower($value->getClientOriginalExtension());
        if ($type != 'exe' && $type != 'bmp' && $type != 'php') {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please select proper file';
    }
}
