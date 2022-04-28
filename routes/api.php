<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\ProdutoController;

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

Route::prefix('marca')->group(function () {
    Route::get('/', [MarcaController::class, 'index']);
    Route::post('/', [MarcaController::class, 'store']);
    Route::post('/show', [MarcaController::class, 'show']);
    Route::post('/update', [MarcaController::class, 'update']);
    Route::post('/delete', [MarcaController::class, 'destroy']);
    Route::post('/restore', [MarcaController::class, 'restore']);
});

Route::prefix('produto')->group(function () {
    Route::get('/', [ProdutoController::class, 'index']);
    Route::post('/', [ProdutoController::class, 'store']);
    Route::post('/show', [ProdutoController::class, 'show']);
    Route::post('/update', [ProdutoController::class, 'update']);
    Route::post('/delete', [ProdutoController::class, 'destroy']);
    Route::post('/restore', [ProdutoController::class, 'restore']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
