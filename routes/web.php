<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FollowController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ArticleController::class,'getArticleList']);
Route::post('/login',[UserController::class,'login']);

Route::get('logout',function(){
    session()->forget('user');
    return redirect(asset('/'));
});
Route::get('/user/info/{id}',[UserController::class,'info']);

Route::get('/user/edit',function (){
    return view("user.edit");
});

Route::post('/user/update',[UserController::class,'update']);
Route::post('/follow',[FollowController::class,"follow"]);
Route::post('/follow_cancel',[FollowController::class,"follow_cancel"]);

Route::get('/signup',function(){return view('user.signup');});
Route::post('/signupToDB',[UserController::class,'signupToDB']);

Route::get('/article/create',[ArticleController::class,'toCreate']);
Route::post('/article/insertToDB',[ArticleController::class,'insertToDB']);
Route::get('/article/success',function (){return view('article.success');});

Route::any('/article/detail/{id}',[ArticleController::class,'getDetail']);
