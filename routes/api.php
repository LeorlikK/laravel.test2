<?php

use App\Http\Controllers\Api\Posts\ApiPostController;
use App\Http\Controllers\VueJS\VueJsAxiosController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//VUE - JS
Route::resource('/vue-js-axios', VueJsAxiosController::class);
//Route::post('/vue-js-axios', VueJsAxiosController::class);
Route::prefix('post')->group(function (){
    Route::get('/', [ApiPostController::class, 'index']);
    Route::post('/create', [ApiPostController::class, 'create']);
    Route::get('/read/{post}', [ApiPostController::class, 'read']);
    Route::patch('/update/{patch}', [ApiPostController::class, 'update']);
    Route::delete('/delete/{post}', [ApiPostController::class, 'delete']);
});
