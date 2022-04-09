<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Room;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/room/data/{id}', [HomeController::class, 'roomNo']);

Route::get('/user', [HomeController::class, 'roomNo']);

Route::get('/{id}/detail', [HomeController::class, 'detail']);

Route::get('/check/{check_in}/{room_no}', [HomeController::class, 'checkDate']);
