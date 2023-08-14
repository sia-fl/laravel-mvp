<?php

use App\Http\Controllers\ComputerController;
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
    return 'hi';
});

Route::get('/qrcode', [ComputerController::class, 'qrcode'])->name('computer.qrcode');
Route::get('/show', [ComputerController::class, 'show'])->name('computer.show');
