<?php

use App\Http\Controllers\CarsControlle;
use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/mycars', function () {
    return view('auth.submit');
});
Route::get('/submit', function () {
    return view('auth.mycars');
});

require __DIR__.'/auth.php';
// routes/web.php

use App\Http\Controllers\CarController;
Route::middleware(['auth'])->group(function () {
    Route::get('/step1', [App\Http\Controllers\CarController::class, 'step1'])->name('step1');
    Route::post('/step1', [App\Http\Controllers\CarController::class, 'postStep1']);
    Route::get('/step2', [App\Http\Controllers\CarController::class, 'step2'])->name('step2');
    Route::post('/step2', [App\Http\Controllers\CarController::class, 'postStep2']);
});
