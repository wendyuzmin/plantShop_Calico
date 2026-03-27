<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PlantaController;


// ---------- AUTH ---------- //rutas publicas 
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


// ---------- CLIENTE + VENDEDOR ---------- todos los usuarios logueados
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
    return response()->json($request->user()); //saber que usuario esta logueado si es cliente mostrar solo catalogo 
});

    // ver catálogo: los clientes y el vendedor pueden ver
    Route::get('/plantas',[PlantaController::class,'index']);

});


// ---------- SOLO VENDEDOR ---------- aqui  entra middleware role
Route::middleware(['auth:sanctum','role:vendedor'])->group(function () {

    Route::post('/plantas',[PlantaController::class,'store']);
    Route::put('/plantas/{id}',[PlantaController::class,'update']);
    Route::delete('/plantas/{id}',[PlantaController::class,'destroy']);

});