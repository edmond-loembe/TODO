<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tasks', Api\TaskController::class);
});
