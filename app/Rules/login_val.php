<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class login_val implements Rule
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
        var_dump($value);
        $user = DB::table('users')
                ->where('email','=',$value["email"])
                ->where('password','=',hash('ripemd160',$value['pass']))
                ->first();
        return $user != null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'メールアドレスかパスワードかが間違います';
    }
}
