<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register', [AuthController::class,'register']);
Route::post('/auth/login', [AuthController::class,'login']);


Route::middleware('auth:sanctum')->group(function (){
    Route::get('/auth/me', [AuthController::class,'me']);
    Route::post('/auth/logout', [AuthController::class,'logout']);
    Route::get('/flights', [FlightController::class,'index']);
    Route::post('/tickets',[TicketController::class,'store']);
    Route::get('/tickets/mine',[TicketController::class,'mine']);
});

