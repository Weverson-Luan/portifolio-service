<?php

use App\Http\Controllers\SkillsController;
use App\Http\Controllers\UsersController;
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


Route::get('/users',[ UsersController::class, "index"]);
Route::post('/users',[ UsersController::class, "store"]);
Route::get('/users/{id}',[ UsersController::class, "show"]);
Route::patch('/users/{id}',[ UsersController::class, "update"]);

/**
 * Skill´s
 */
Route::post("/skills", [SkillsController::class, "store"]);
Route::get("/skills", [SkillsController::class, "index"]);