<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'sendMessage']);
Route::get('/consumer', [UserController::class, 'consumer']);
