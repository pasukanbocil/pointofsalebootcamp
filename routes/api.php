<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product', [ApiController::class, 'index']);
Route::post('/product', [ApiController::class, 'store']);
Route::get('/product/{id}', [ApiController::class, 'show']);
Route::put('/product/edit/{id}', [ApiController::class, 'update']);
Route::delete('/product/delete/{id}', [ApiController::class, 'destroy']);
