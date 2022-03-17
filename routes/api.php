<?php

use App\Http\Controllers\TrainController;
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


Route::get("/trains",[TrainController::class,"index"]);
Route::get("/trains/{train}",[TrainController::class,"show"]);
Route::post("/trains",[TrainController::class,"create"]);
Route::put("/trains/{train}",[TrainController::class,"update"]);
Route::delete("/trains/{train}",[TrainController::class,"destroy"]);