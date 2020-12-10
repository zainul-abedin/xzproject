
<?php

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


//Route::resource('reunion', 'App\Http\Controllers\ReunionController');

Route::get('reunion', [App\Http\Controllers\ReunionController::class, 'index'])->name('reunion.index');
Route::get('reunion/data', [App\Http\Controllers\ReunionController::class, 'data'])->name('reunion.data');
Route::post('reunion/create', [App\Http\Controllers\ReunionController::class, 'create'])->name('reunion.create');
Route::post('reunion', [App\Http\Controllers\ReunionController::class, 'store'])->name('reunion.store');
Route::get('reunion/{reunion}', [App\Http\Controllers\ReunionController::class, 'show'])->name('reunion.show');
Route::get('reunion/details/{reunion}', [App\Http\Controllers\ReunionController::class, 'details'])->name('reunion.details');
Route::get('reunion/{reunion}/edit', [App\Http\Controllers\ReunionController::class, 'edit'])->name('reunion.edit');
Route::put('reunion/{reunion}', [App\Http\Controllers\ReunionController::class, 'update'])->name('reunion.update');
Route::delete('reunion/{reunion}', [App\Http\Controllers\ReunionController::class, 'destroy'])->name('reunion.destroy');

// Route for ContactController
Route::resource('contact','App\Http\Controllers\ContactController');

// Route for Responsable
Route::resource('responsable', 'App\Http\Controllers\ResponsableController');

//Route for ChantierAdresseController
Route::resource('chantierAdresse', 'App\Http\Controllers\ChantierAdresseController');

//Route for LocationController
Route::resource('location', 'App\Http\Controllers\LocationController');

// Route for ChantirController
Route::get('chantier', [App\Http\Controllers\ChantierController::class, 'index'])->name('chantier.index');
Route::get('chantier/data', [App\Http\Controllers\ChantierController::class, 'data'])->name('chantier.data');
Route::get('chantier/create', [App\Http\Controllers\ChantierController::class, 'create'])->name('chantier.create');
Route::post('chantier', [App\Http\Controllers\ChantierController::class, 'store'])->name('chantier.store');
Route::get('chantier/{chantier}', [App\Http\Controllers\ChantierController::class, 'show'])->name('chantier.show');
Route::get('chantier/details/{chantier}', [App\Http\Controllers\ChantierController::class, 'details'])->name('chantier.details');
Route::get('chantier/{chantier}/edit', [App\Http\Controllers\ChantierController::class, 'edit'])->name('chantier.edit');
Route::put('chantier/{chantier}', [App\Http\Controllers\ChantierController::class, 'update'])->name('chantier.update');
Route::delete('chantier/{chantier}', [App\Http\Controllers\ChantierController::class, 'destroy'])->name('chantier.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
