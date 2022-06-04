<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('index');});
Route::post('/login',[UserController::class,'login']);

Route::get('/signup',function(){return view('user.signup');});
Route::post('/signupToDB',[UserController::class,'signupToDB']);

Route::get('logout',function(){
    session()->forget('user');
    return view('index');
});