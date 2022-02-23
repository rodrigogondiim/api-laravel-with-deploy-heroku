<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\PessoaController;

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

Route::post("/cidades/search", [CidadeController::class,"search"]);
Route::apiResource('cidades', CidadeController::class);
Route::apiResource('pessoas', PessoaController::class);

