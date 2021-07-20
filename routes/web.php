<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PointageController;
use App\Http\Controllers\EntreprisesController;
use App\Http\Controllers\parametre\ParamSocieteController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('/entreprise', EntreprisesController::class);

Route::middleware(['auth:sanctum', 'verified'])->prefix('rh')->group(function () {
    Route::resource('/employe', EmployeController::class);
    Route::resource('/pointage', PointageController::class);
    Route::resource('/poste', PosteController::class);
    Route::resource('/contrat', ContratController::class);
    Route::get('/contrat/articles/type-contrat/{id}', [ContratController::class, 'articleParTypeContrat']);
    Route::post('/contrat/pdf/apercu', [PDFController::class, 'preview'])->name('contrat.pdf.preview');
    Route::post('/contrat/pdf/generate', [PDFController::class, 'generatePDF'])->name('contrat.pdf.generate');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('parametre')->group(function () {
    Route::resource('/societe', ParamSocieteController::class);
});

Route::get('/entreprise/create/country/{id}', [CountryController::class, 'getCitiesPerCountry']);


