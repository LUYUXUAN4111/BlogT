<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function follow(Request $request){
        $follower = new Follower();
        $follower->follow_id = $request->follow;
        $follower->follower_id = $request->follower;
        $follower->save();
    }

    public function follow_cancel(Request $request){
        DB::delete('DELETE FROM followers WHERE follow_id = ? AND follower_id = ?',[$request->follow,$request->follower]);
    }
}
