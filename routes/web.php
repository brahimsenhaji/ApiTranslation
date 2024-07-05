<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClearbitController;
use App\Http\Controllers\JigsawStackTranslationController;
use App\Http\Controllers\LogoController;
use Illuminate\Support\Facades\Http;


Route::get('/', [JigsawStackTranslationController::class, 'index']);

Route::get('/get-logo', [ClearbitController::class, 'showLogo']);


Route::get('/logo',[LogoController::class, 'index']);