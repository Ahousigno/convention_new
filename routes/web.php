<?php

use App\Http\Controllers\ClientController;
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
    return view('client.accueil');
});
Route::get('/accueil', [ClientController::class, 'index'])->name('client.accueil');
Route::get('/presentation', [ClientController::class, 'presentation'])->name('client.presentation');
Route::get('/partenariat', [ClientController::class, 'demande_partenariat'])->name('client.partenariat');
Route::get('/mediatheque', [ClientController::class, 'mediatheque'])->name('client.mediatheque');
Route::get('/convention', [ClientController::class, 'demande_convention'])->name('client.convention');