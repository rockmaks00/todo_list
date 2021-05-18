<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index'])->middleware(['auth']);

Route::get('/tasks/get', [TasksController::class, 'get'])->middleware(['auth']);
Route::post('/tasks/create', [TasksController::class, 'create'])
    ->middleware(['auth'])
    ->name('create');
Route::post('/tasks/update', [TasksController::class, 'update'])
    ->middleware(['auth'])
    ->name('update');

require __DIR__.'/auth.php';
