<?php

use App\Http\Controllers\API\Postcontroller;
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

Route::get('/user', function (Request $request) { return $request->user();})->middleware('auth:sanctum');

Route::apiResource('posts', \App\Http\Controllers\API\PostController::class);

