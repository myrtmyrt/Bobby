<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/login', [LoginController::class, 'login'])->name("login");
Route::get('/logout', [LoginController::class, 'logout'])->name("logout");
Route::get('/', [HomeController::class, 'home'])->name("home");

Route::get('/myAsso', [\App\Http\Controllers\AssoController::class, 'getAssoItems'])->name("myAsso")->middleware(\App\Http\Middleware\Connexion::class);
Route::get('/changeAsso', [\App\Http\Controllers\AssoController::class, 'changeAsso'])->name('myAsso')->middleware(\App\Http\Middleware\Connexion::class);
Route::get('/mesDemandes', [\App\Http\Controllers\AssoController::class, 'myRequests'])->name('assoRequests')->middleware(\App\Http\Middleware\Connexion::class);


Route::get('/materiel', [\App\Http\Controllers\MaterielController::class, 'getClasses'])->name("materiel")->middleware(\App\Http\Middleware\Connexion::class);
Route::post('/materiel', [\App\Http\Controllers\MaterielController::class, 'getAssoItems'])->name("materiel")->middleware(\App\Http\Middleware\Connexion::class);

Route::post('/addObject', [\App\Http\Controllers\MaterielController::class, 'store'])->name('addObject')->middleware(\App\Http\Middleware\Connexion::class);

Route::get('/demandeEmprunt/{class_id}', [\App\Http\Controllers\BorrowController::class, 'getForm'])->name("borrowRequests")->middleware(\App\Http\Middleware\Connexion::class);
Route::post('/demandeEmprunt/{class_id}', [\App\Http\Controllers\BorrowController::class, 'addRequest'])->name("borrowRequests")->middleware(\App\Http\Middleware\Connexion::class);

Route::get('/gererDemandes', [\App\Http\Controllers\BorrowController::class, 'getAssoRequests'])->name('manageRequests')->middleware(\App\Http\Middleware\Connexion::class);
Route::get('/refuserDemande/{id}', [\App\Http\Controllers\BorrowController::class, 'denyRequest'])->name('denyRequest')->middleware(\App\Http\Middleware\Connexion::class);
Route::get('/accepterDemande/{id}', [\App\Http\Controllers\BorrowController::class, 'acceptRequest'])->name('acceptRequest')->middleware(\App\Http\Middleware\Connexion::class);
Route::get('/supprimerDemande/{id}', [\App\Http\Controllers\BorrowController::class, 'deleteRequest'])->name('deleteRequest')->middleware(\App\Http\Middleware\Connexion::class);

