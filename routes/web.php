<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

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

Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/create', [StudentController::class, 'create']);
Route::post('/student', [StudentController::class, 'store']);
Route::get('/student/{student}', [StudentController::class, 'show']);
Route::get('/student/{student}/edit', [StudentController::class, 'edit']);
Route::patch('/student/{student}', [StudentController::class, 'update']);
Route::delete('/student/{student}', [StudentController::class, 'destroy']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/student', [StudentController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});