<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Project;

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

Route::get('/projects/', [App\Http\Controllers\Api\V1\IndexController::class, 'index'])->name('projects');
Route::get('/projects/{id}', [App\Http\Controllers\Api\V1\IndexController::class, 'show'])->name('projects');
