<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;


// use Illuminate\Support\Facades\DB;

class email_exist implements Rule
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
        $user = User::where('email', '=', $value)->first();
        return $user===null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '入力したメールアドレスは既に登録されている';
    }
}
