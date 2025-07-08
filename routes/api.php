<?php

use App\Http\Controllers\APi\AdminTutorialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\TutorialController;
use App\Http\Controllers\Api\TrendGoogleController;

Route::middleware('api')->group(function () {
    Route::get('/tutorials', [TutorialController::class, 'index']);//show tutorial
    Route::get('/trendgoogle', [TrendGoogleController::class, 'index']);
    Route::post('/admin/tutorials', [AdminTutorialController::class, 'store']);//create tutorial

});


