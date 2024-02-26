<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomDetailsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);


    Route::apiResource('/users', \App\Http\Controllers\UserController::class);
    Route::apiResource('/rooms', \App\Http\Controllers\RoomController::class);
    Route::apiResource('/reservations', \App\Http\Controllers\ReservationController::class);
    Route::apiResource('/sizes', \App\Http\Controllers\SizeController::class);

    Route::post('/reservations/total-cost', [\App\Http\Controllers\ReservationController::class, 'totalCost']);

    Route::get('/room-details/available', [RoomDetailsController::class, 'availableRooms']);
    Route::get('/room-details/cost/{room}', [RoomDetailsController::class, 'getRoomCost']);
    Route::get('/room-details/size/{room}', [RoomDetailsController::class, 'getRoomSize']);
});


Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);


