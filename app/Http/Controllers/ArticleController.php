<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function toCreate(){
        if (!session("user")){
            return redirect(asset('nologin'));
        }
        return view("article.create");
    }
}
