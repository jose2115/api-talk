<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ItemTalkController;
use App\Http\Controllers\TalkController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/login', [UserController::class, 'login']);    //loguear usuario

// rutas para gestionar tareas independeientes 

Route::get('/talks', [TalkController::class, 'index']);
Route::post('/create/talks', [TalkController::class, 'store']);
Route::post('/update/talks/{id}', [TalkController::class, 'update']);
Route::delete('/delete/talks/{id}', [TalkController::class, 'destroy']);

// rutas para gestionar grupos 

Route::get('/groups', [GroupController::class, 'index']);
Route::post('/create/groups', [GroupController::class, 'store']);
Route::post('/update/groups/{id}', [GroupController::class, 'update']);
Route::delete('/delete/groups/{id}', [GroupController::class, 'destroy']);

// rutas para gestionar item de grupos 

Route::post('/create/item/{id}', [ItemTalkController::class, 'store']);
Route::post('/update/item/{id}', [ItemTalkController::class, 'update']);
Route::delete('/delete/item/{id}', [ItemTalkController::class, 'destroy']);