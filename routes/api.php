<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpertiseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[UserController::class,'login']);
Route::post('register',[UserController::class,'register']);

Route::group(['middleware'=>['auth:api','checkExpirt']],function(){

    Route::post('create',[ExpertiseController::class,'create']);
});

Route::group(['middleware'=>['auth:api']],function(){
    Route::get('details/{ex_id}',[ExpertiseController::class,'details']);
    Route::post('logout',[UserController::class,'logout']);
    Route::get('list/{id}',[ExpertiseController::class,'list']);
    Route::get('delete/{ex_id}',[ExpertiseController::class,'delete']);
});
