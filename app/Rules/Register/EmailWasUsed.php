<?php

namespace App\Rules\Register;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class EmailWasUsed implements Rule
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
        $email = strtolower($value);

        return !User::where('email', $email)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('Email is busy please try anoother one');
    }
}
