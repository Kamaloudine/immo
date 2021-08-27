<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChambresController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\VillesController;
use App\Http\Controllers\QuartiersController;
use App\Http\Controllers\TypeChambresController;


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

    //Chambres ressoures 
    Route::get('/chambres', [ChambresController::class,'index']);
    Route::get('/chambres/{id}', [ChambresController::class,'show']);
    Route::post('/chambres', [ChambresController::class,'store']);
    Route::put('/chambres', [ChambresController::class,'update']);
    Route::delete('/chambres/{id}', [ChambresController::class,'delete']);

    //COUNTRIES RESOURCES
    Route::get('/pays', [PaysController::class,'index']);
    Route::get('/pays/{id}', [PaysController::class,'show']);
    Route::post('/pays', [PaysController::class,'store']);
    Route::put('/pays', [PaysController::class,'update']);
    Route::delete('/pays/{id}', [PaysController::class,'delete']);

    //TOWN RESOURECES
    Route::get('/villes', [VillesController::class,'index']);
    Route::get('/villes/{id}', [VillesController::class,'show']);
    Route::post('/villes', [VillesController::class,'store']);
    Route::put('/villes', [VillesController::class,'update']);
    Route::delete('/villes/{id}', [VillesController::class,'delete']);

    //QUARTIERS RESOURCES
    Route::get('/quartiers', [QuartiersController::class,'index']);
    Route::get('/quartiers/{id}', [QuartiersController::class,'show']);
    Route::post('/quartiers', [QuartiersController::class,'store']);
    Route::put('/quartiers', [QuartiersController::class,'update']);
    Route::delete('/quartiers/{id}', [QuartiersController::class,'delete']);

    //TYPE_CHAMBRES
    Route::get('/types', [TypeChambresController::class,'index']);
    Route::get('/types/{id}', [TypeChambresController::class,'show']);
    Route::post('/types', [TypeChambresController::class,'store']);
    Route::put('/types', [TypeChambresController::class,'update']);
    Route::delete('/types/{id}', [TypeChambresController::class,'delete']);

});
