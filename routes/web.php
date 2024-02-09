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

Route::middleware('auth')->group(function () {
    //
    Route::get('/auto/aanbod', function () {
    return view('createOffer');
    });
     Route::get('/auto/aanbod/stap2', function () {
    return view('createOfferStep2');
    });
    
});

Route::get('/submit', function () {
    return view('auth.submit');
});

require __DIR__.'/auth.php';
