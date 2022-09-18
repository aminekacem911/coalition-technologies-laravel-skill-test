<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

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

Route::view('/','auth.login');
Auth::routes(['register' => false]);
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('update-order', [HomeController::class, "updateOrder"])->name("update-order");

    Route::prefix('tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks');

        Route::post('/store', [TaskController::class, 'store'])->name('task.store');
        Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
        Route::post('/update', [TaskController::class, 'update'])->name('task.update');
        Route::get('/delete/{task}', [TaskController::class, 'delete'])->name('task.delete');
    });

});
