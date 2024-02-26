<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\VerifiedEmailController;
use App\Http\Controllers\API\Auth\LoginController;

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

Route::post("/auth/register", [RegisterController::class, "store"]);
Route::get("/auth/verified-account/{token}", [VerifiedEmailController::class, "index"]);

Route::post("/auth/login", [LoginController::class, "store"]);
