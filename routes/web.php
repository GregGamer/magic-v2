<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DeckController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::view('about', 'about')->name('about')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('card', CardController::class);
    Route::resource('deck', DeckController::class);
    Route::resource('collection', CollectionController::class);
    Route::resource('archive', ArchiveController::class);

    Route::view('/settings', 'user.settings')->name('user.settings');
});
