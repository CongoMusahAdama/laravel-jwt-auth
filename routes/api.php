<?php

use Illuminate\Http\Request; //request used to handle HTTP request
use Illuminate\Support\Facades\Route; //help define routes for the application
use App\Http\Controllers\AuthController;  //handles the authentication (registering and logging in)

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
//sanctum



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//the route will be https:localhost:..../api/auth/..the function follows 

Route::group(['middleware'=>'api','prefix'=>'auth'], function ($router){
    Route::post ('/register',[AuthController::class, 'register']);
    Route::post ('/login',[AuthController::class, 'login']);
    Route::get('/profile',[AuthController::class, 'profile']);
    Route::post('/logout',[AuthController::class, 'logout']);
});

