<?php

namespace App\Http\Controllers;

use App\Functions\UserFunctions;
use App\Functions\UserC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $uf->login($request->form['email']);
        return redirect($request->url);
    }

    public function info(Request $request,$id){
        $uf = new UserFunctions();
        $viewer_id = session('user')? unserialize(session('user'))->getId():null;
        $follow = DB::table('followers')->where('follow_id','=',$id)->where('follower_id','=',$viewer_id)
            ->first();
        $owner = $viewer_id == $id;
        $info  = $uf->getInfo($id,$owner);
        return view('user.info',["owner"=>$info[0],"articles"=>$info[1],"is_owner"=>$owner,'follow'=>$follow]);
    }

    public function update(Request $request){
        $uf = new UserFunctions();
        $uf->update($request);
        return redirect(asset('/user/info/'.$request->id));
    }
}
