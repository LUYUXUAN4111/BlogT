<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    function toCreate(){
        if (!session("user")){
            return redirect(asset('nologin'));
        }
        return view("article.create");
    }

    function insertToDB(Request $request){

        $id = DB::table('articles')->insertGetId(
          [
              'user_id' => $request->user_id,
              'title' => $request->title,
              'category' => $request->category,
              'viewable' => $request->viewable,
              'article' => $request->article,
              'created_at' => date('Y-m-d h:i:s', time()),
              'updated_at' => date('Y-m-d h:i:s', time())
          ]
        );
        return redirect('article/success')->with("id",$id);
    }

    function getArticleList(){
        $articles = DB::table('articles')->where("viewable","!=","0")->inRandomOrder()->take(5)->get();
        $category = DB::select('SELECT category,count(*) c from articles group by category order by c DESC ');
        $article_list = [];
        foreach ($articles as $article){
            $user = DB::table('user_infos')->where('id','=',$article->user_id)->first();
            $article_list[]= [
                'title' => $article->title,
                'article' => $article->article,
                'category' => $article->category,
                'date' => date_format(date_create($article->updated_at),"Y-m-d"),
                'article_id' =>  $article->id,
                'name' => $user->name,
                'user_id' => $user->id,
                'icon' => $user->icon
            ];
        }
        return view('index',['articles'=>$article_list,'category'=>$category]);
    }

    function getDetail($id){
        $article = DB::table('articles')->where("id","=",$id)->first();
        $writer = User_info::where("id","=",$article->user_id)->first();
        $viewable = "1";
        $user_session = unserialize(session("user"));
        $user_id = $user_session->getId();
        $follower = DB::table('followers')->where("follow_id","=",$article->user_id)
            ->where("follower_id","=",$user_id)->first();
        if($article->viewable!="1"){
            if ($user_id!=$article->user_id){
                if ($article->viewable=="0"){
                    $viewable = "0";
                }else{
                    if (!$follower){
                        $viewable = "2";
                    }else{
                        $viewable = "3";
                    }
                }
            }
        }elseif ($follower){
            $viewable = "3";
        }
        return view('article.detail',['article'=>$article,'viewable'=>$viewable,'writer'=>$writer]);
    }
}
