<?php

use App\Http\Controllers\Fortune\FortuneController;
use App\Http\Controllers\Hello\HelloController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/', [HelloController::class, 'hello']);

Route::prefix('/fortune')->group(function () {
    Route::get('/', [FortuneController::class, 'index'])->name('fortune.index');
    Route::get('/result/', [FortuneController::class, 'result'])->name('fortune.result');
});
