<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BlameController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PointageController;
use App\Http\Controllers\RetraiteController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\MiseAPiedController;
use App\Http\Controllers\EntreprisesController;
use App\Http\Controllers\BibliothequeController;
use App\Http\Controllers\LicenciementController;
use App\Http\Controllers\AvertissementController;
use App\Http\Controllers\DemandeExplicationController;
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
    Route::get('/employes/liste-tableau', [EmployeController::class, 'listeTableau'])->name('employe.listeTableau');
    Route::resource('/pointage', PointageController::class);
    Route::resource('/conge', CongeController::class);
    Route::resource('/poste', PosteController::class);
    Route::resource('/contrat', ContratController::class);
    Route::resource('/mission', MissionController::class);
    Route::get('/contrat/articles/type-contrat/{id}', [ContratController::class, 'articleParTypeContrat']);
    Route::post('/contrat/pdf/apercu', [PDFController::class, 'preview'])->name('contrat.pdf.preview');
    Route::post('/contrat/pdf/generate', [PDFController::class, 'generatePDF'])->name('contrat.pdf.generate');
    Route::resource('discipline/demande-explication', DemandeExplicationController::class);
    Route::post('discipline/demande-explication/collaborateur-service', [DemandeExplicationController::class, 'getServiceAndPoste']);
    
    Route::resource('discipline/avertissement', AvertissementController::class);
    Route::get('/avertissement/pdf/apercu/{id}', [AvertissementController::class, 'preview'])->name('avertissement.pdf.preview');
    Route::get('/avertissement/pdf/generate/{id}', [AvertissementController::class, 'generatePDF'])->name('avertissement.pdf.generate');
    Route::resource('discipline/blame', BlameController::class);
    Route::resource('discipline/mise-a-pied', MiseAPiedController::class); 

    Route::resource('/licenciement', LicenciementController::class);
    Route::get('/licenciement-personnel/pdf/apercu/{id}', [LicenciementController::class, 'previewPersonnel'])->name('licenciement.pdf.previewPersonnel');
    Route::get('/licenciement-economique/pdf/apercu/{id}', [LicenciementController::class, 'previewEconomique'])->name('licenciement.pdf.previewEconomique');

    Route::get('/licenciement/pdf/generate/{id}', [LicenciementController::class, 'generatePDF'])->name('licenciement.pdf.generate');

    Route::resource('/preavis-retraite', RetraiteController::class);
    Route::get('/preavis-retraite/pdf/apercu/{id}', [RetraiteController::class, 'preview'])->name('retraite.pdf.preview');

});

Route::middleware(['auth:sanctum', 'verified'])->prefix('parametre')->group(function () {
    Route::resource('/societe', ParamSocieteController::class);
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('bibliotheque')->group(function () {
    Route::resource('/accueil-biblio', BibliothequeController::class);
});
 
Route::get('/entreprise/country/{id}', [CountryController::class, 'getCitiesPerCountry']);
Route::get('/entreprise/create/country/{id}', [CountryController::class, 'getCitiesPerCountry']);

Route::get('service-poste-collaborateur', [DemandeExplicationController::class, 'getServiceAndPoste']); 


