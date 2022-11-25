<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminPanelMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// PUBLIC ROUTES =========================================================
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('project.create');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::patch('/projects/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('project.delete');
});
Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');

//issues
Route::get('/issues', [IssueController::class, 'index'])->name('issue.index');
Route::post('/issues', [IssueController::class, 'store'])->name('issue.store');
Route::get('/issues/create', [IssueController::class, 'create'])->name('issue.create');
Route::get('/issues/{issue}', [IssueController::class, 'show'])->name('issue.show');
Route::get('/issues/{issue}/edit', [IssueController::class, 'edit'])->name('issue.edit');
Route::get('/issues/{issue}/edit', [IssueController::class, 'edit'])->name('issue.edit');
Route::patch('/issues/{issue}', [IssueController::class, 'update'])->name('issue.update');
Route::delete('/issues/{issue}', [IssueController::class, 'destroy'])->name('issue.delete');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/projects/{id}/show', [ProjectController::class, 'create'])->name('projects.show');

Route::get('/users/create', [UserController::class, 'create']);

require __DIR__.'/auth.php';
