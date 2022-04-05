<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\V1\PostController as PostV1;
use App\Http\Controllers\Api\V2\PostController as PostV2;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('v1/posts', PostV1::class)->only('show');

//Api V1
Route::apiResource('v1/posts', PostV1::class)
    ->only(['index', 'show', 'destroy'])
    ->middleware('auth:sanctum');

//Api V2
    Route::apiResource('v2/posts', PostV2::class)
    ->only(['index', 'show'])
    ->middleware('auth:sanctum');

    Route::post('login', [
        LoginController::class,
        'login'
    ]);
