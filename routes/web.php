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

Route::get('/myAsso', [\App\Http\Controllers\AssoController::class, 'getAssoItems'])->name("myAsso");
Route::get('/changeAsso', [\App\Http\Controllers\AssoController::class, 'changeAsso'])->name('myAsso');
Route::get('/mesDemandes', [\App\Http\Controllers\AssoController::class, 'myRequests'])->name('assoRequests');


Route::get('/materiel', [\App\Http\Controllers\MaterielController::class, 'getClasses'])->name("materiel");
Route::post('/materiel', [\App\Http\Controllers\MaterielController::class, 'getAssoItems'])->name("materiel");
//Route::get('/materiel/{name}', [\App\Http\Controllers\MaterielController::class, 'getClassByName'])->name("materiel");
//Route::get('/materiel/search', [\App\Http\Controllers\MaterielController::class, 'searchClassesByAsso'])->name("materiel");


Route::post('/addObject', [\App\Http\Controllers\MaterielController::class, 'store'])->name('addObject');

Route::get('/demandeEmprunt/{class_id}', [\App\Http\Controllers\BorrowController::class, 'getForm'])->name("borrowRequests");
Route::post('/demandeEmprunt/{class_id}', [\App\Http\Controllers\BorrowController::class, 'addRequest'])->name("borrowRequests");

Route::get('/gererDemandes', [\App\Http\Controllers\BorrowController::class, 'getAssoRequests'])->name('manageRequests');
Route::get('/refuserDemande/{id}', [\App\Http\Controllers\BorrowController::class, 'denyRequest'])->name('denyRequest');
Route::get('/accepterDemande/{id}', [\App\Http\Controllers\BorrowController::class, 'acceptRequest'])->name('acceptRequest');
Route::get('/supprimerDemande/{id}', [\App\Http\Controllers\BorrowController::class, 'deleteRequest'])->name('deleteRequest');

