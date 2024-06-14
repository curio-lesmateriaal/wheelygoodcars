<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and assigned to the "web" middleware group.
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/mycars', [CarController::class, 'index'])->name('mycars');
    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::post('/cars/{car}/update', [CarController::class, 'update'])->name('cars.update');
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

    Route::get('/step1', [CarController::class, 'step1'])->name('step1');
    Route::post('/step1', [CarController::class, 'postStep1']);
    Route::get('/step2', [CarController::class, 'step2'])->name('step2');
    Route::post('/step2', [CarController::class, 'postStep2']);
});

require __DIR__.'/auth.php';
