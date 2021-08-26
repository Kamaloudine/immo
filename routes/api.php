<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChambresController;


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
Route::post('authenticate', [AuthController::class, 'authenticate']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('profile', [AuthController::class, 'profile']);
    Route::get('chambres', [ChambresController::class,'index']);
    Route::get('chambres/{id}', [ChambresController::class,'show']);
    Route::post('chambres/create', [ChambresController::class,'store']);
    Route::put('chambres/update/{chambres}', [ChambresController::class,'update']);
    Route::delete('chambres/delete/{chambres}', [ChambresController::class,'delete']);
});
