<?php

use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\StudentsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('students', StudentsController::class);
// Route::get('buku', \App\Http\Controllers\Api\BukuController::class . '@index');
// Route::get('buku/{id}', \App\Http\Controllers\Api\BukuController::class . '@show');
Route::apiResource('buku', BukuController::class);