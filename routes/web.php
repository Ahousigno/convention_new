<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConventionController;
use App\Http\Controllers\RechercheController;
use Illuminate\Support\Facades\Route;

//client
Route::get('/', [ClientController::class, 'index'])->name('client.accueil');
Route::get('/presentation', [ClientController::class, 'presentation'])->name('client.presentation');
Route::get('/partenariat', [ClientController::class, 'demande_partenariat'])->name('client.partenariat');
Route::post('/partenariat/store', [ClientController::class, 'store'])->name('partenariat.store');
Route::get('/mediatheque', [ClientController::class, 'mediatheque'])->name('client.mediatheque');
Route::get('/convention', [ClientController::class, 'demande_convention'])->name('client.convention');
Route::get('/tous-les-partenaires', [ClientController::class, 'all_partenariats'])->name('all_partenariats');
Route::get('/tdynamique', [ClientController::class, 'tres_dynamique'])->name('client.tres_dynamique');
Route::get('/dynamique', [ClientController::class, 'dynamique'])->name('client.dynamique');
Route::get('/mdynamique', [ClientController::class, 'moins_dynamique'])->name('client.moins_dynamique');
Route::get('/infos/{id}', [ClientController::class, 'infos'])->name('client.info');

//partie admin
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('admin/attente', [AdminController::class, 'demande_attente'])->name('admin.partenariat.demande_attente');
Route::get('edit/attente/{id}', [AdminController::class, 'edit_attente'])->name('admin.partenariat.edit_demande');
Route::post('edit/update', [AdminController::class, 'edit_update'])->name('add_update');
Route::post('demande/delete', [AdminController::class, 'demande_attente_delete'])->name('admin.demande_attentes_delete');

//modal
Route::post('modal/drive', [AdminController::class, 'drive_modal'])->name('lien_drive');
Route::post('modal/motif', [AdminController::class, 'motif_modal'])->name('rejet');

//activite
Route::post('activite', [AdminController::class, 'activite'])->name('activite');
Route::delete('/delete{id}', [AdminController::class, 'activite_delete'])->name('activite-sup');
require __DIR__ . '/auth.php';

#Convention
Route::post('/save_demande_conventions', [ConventionController::class, 'save_demande_convention'])->name('save_demande_convention');
Route::post('conventions/{id}/valider', [ConventionController::class, 'valider'])->name('conventions.valider');
Route::post('conventions{id}/refuser', [ConventionController::class, 'refuser'])->name('conventions.refuser');
Route::get('/demande_convention', [ConventionController::class, 'show_demande_convention'])->name('show_demande_convention');

#validation
Route::get('/validation', [AdminController::class, 'validation_encours'])->name('admin.validation.encours');
Route::post('/validation', [AdminController::class, 'validation_store'])->name('validation_partner');
Route::post('/validation_delete', [AdminController::class, 'validation_delete'])->name('validation_delete');
Route::get('/information/{id}', [AdminController::class, 'infos_partenaire'])->name('admin.validation.infos_partenaire');


//partie partenaire
Route::get('/partenaire', [AdminController::class, 'partenaire'])->name('admin.validation.partenaire');
Route::get('/confidentialite', [ClientController::class, 'confidence'])->name('client.confidentialite');

//partie rejetee
Route::get('/demande-rejetee', [AdminController::class, 'demande_rejetee'])->name('admin.demande_rejetee');
Route::post('/rejetee_delete', [AdminController::class, 'rejetee_delete'])->name('admin.rejetee_delete');


//categorie
Route::get('/categorie', [AdminController::class, 'categorie'])->name('admin.categorie.create');
Route::get('/categorie_create', [AdminController::class, 'categorie_edit'])->name('categorie_create');
Route::post('/categorie_save', [AdminController::class, 'categorie_save'])->name('categorie_save');
Route::get('/categorie_edit/{id}', [AdminController::class, 'categorie_edit'])->name('admin.categorie.edit');
Route::post('/categorie_edit/{id?}', [AdminController::class, 'categorie_update'])->name('admin.categorie_update');
Route::post('/categorie_delete', [AdminController::class, 'categorie_delete'])->name('admin.categorie_delete');


//article
Route::get('/article_base', [AdminController::class, 'article_base'])->name('admin.article.base');
Route::get('/article_add', [AdminController::class, 'article_add'])->name('admin.article.add');
Route::post('/article_save', [AdminController::class, 'article_save'])->name('article_save');
Route::get('/article_edit/{id}', [AdminController::class, 'article_edit'])->name('admin.article.edit');
Route::put('/article_edit/{id}', [AdminController::class, 'article_update'])->name('admin.article_update');
Route::post('/article_delete', [AdminController::class, 'article_delete'])->name('admin.article_delete');


//recherche
Route::post('/search', [RechercheController::class, 'search'])->name('client.recherche');
