<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TaskController::class, 'index'])->name('task.index');
Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/store/user',[AuthController::class,'storeUser'])->name('store.user');
Route::post('/logout',[AuthController::class,'logout'])->name('user.logout');
Route::post('/auth',[AuthController::class,'authenticate'])->name('user.authenticate');
