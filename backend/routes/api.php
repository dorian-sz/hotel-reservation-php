<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\RoomController;
use \App\Http\Controllers\ReservationController;
use \App\Http\Controllers\SizeController;
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

    Route::apiResource('/users', UserController::class);
    Route::apiResource('/rooms', RoomController::class);
    Route::apiResource('/reservations', ReservationController::class);
    Route::apiResource('/sizes', SizeController::class);

    Route::get('/user-reservations/{user}', [ReservationController::class, 'showUserReservation']);

    Route::get('/room-details/available', [RoomController::class, 'availableRooms']);
    Route::get('/rooms-details/cost/{room}', [RoomController::class, 'getRoomCost']);
    Route::get('/room-details/size/{room}', [RoomController::class, 'getRoomSize']);
});

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);


