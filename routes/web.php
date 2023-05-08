<?php

use App\Http\Controllers\AdminController;
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
Route::post('/partenariat/store', [ClientController::class, 'store'])->name('partenariat.store');
Route::get('/mediatheque', [ClientController::class, 'mediatheque'])->name('client.mediatheque');
Route::get('/convention', [ClientController::class, 'demande_convention'])->name('client.convention');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('admin/attente', [AdminController::class, 'demande_attente'])->name('admin.partenariat.demande_attente');
Route::get('edit/attente/{id}', [AdminController::class, 'edit_attente'])->name('admin.partenariat.edit_demande');
Route::post('edit/update/{id}', [AdminController::class, 'edit_update'])->name('add_update');
Route::get('demande/delete', [AdminController::class, 'demande_attente_delete'])->name('admin.demande_attentes_delete');

require __DIR__ . '/auth.php';