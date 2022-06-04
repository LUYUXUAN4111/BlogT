<?php

namespace App\Http\Controllers;

use App\Functions\UserFunctions;
use App\Functions\UserC;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function signupToDB(Request $request){
        $uf = new UserFunctions();

        $rule = $uf->SIGNUP_RULE;
        $message = $uf->SIGNUP_MESSAGE;

        $this->validate($request,$rule,$message);

        $uf->insertUserToDB($request);

        return redirect(asset('/'));
    }

    public function login(Request $request){
        $uf = new UserFunctions();

        $rule = $uf->LOGIN_RULE;
        $message = $uf->LOGIN_MESSAGE;

        $this->validate($request,$rule,$message);

        // $user = new UserC();
        // $user->getName();
        $uf->login($request->form['email']);
        return redirect(asset('/'));        
    }
}
