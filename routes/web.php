
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

// Route for element
//Route::resource('element', 'App\Http\Controllers\ElementController');
Route::get('element', [App\Http\Controllers\ElementController::class,'index'])->name('element.index');
Route::get('element/create/{reunion_id?}', [App\Http\Controllers\ElementController::class,'create'])->name('element.create');
Route::post('element', [App\Http\Controllers\ElementController::class,'store'])->name('element.store');
Route::get('element/{element}', [App\Http\Controllers\ElementController::class,'show'])->name('element.show');
Route::get('element/{element}/edit', [App\Http\Controllers\ElementController::class,'edit'])->name('element.edit');
Route::put('element/{element}', [App\Http\Controllers\ElementController::class,'update'])->name('element.update');
Route::delete('element/{element}', [App\Http\Controllers\ElementController::class,'destroy'])->name('element.destroy');

// Route for ElementPhotoControlle
//Route::resource('elementPhotos', 'App\Http\Controllers\ElementPhotoController');
Route::get('elementPhotos/{element_id?}', [App\Http\Controllers\ElementPhotoController::class,'index'])->name('elementPhotos.index');
Route::get('elementPhotos/create/{element_id?}', [App\Http\Controllers\ElementPhotoController::class,'create'])->name('elementPhotos.create');
Route::post('elementPhotos', [App\Http\Controllers\ElementPhotoController::class,'store'])->name('elementPhotos.store');
Route::get('elementPhotos/{elementPhotos}/show', [App\Http\Controllers\ElementPhotoController::class,'show'])->name('elementPhotos.show');
Route::get('elementPhotos/{elementPhotos}/edit', [App\Http\Controllers\ElementPhotoController::class,'edit'])->name('elementPhotos.edit');
Route::put('elementPhotos/{elementPhotos}', [App\Http\Controllers\ElementPhotoController::class,'update'])->name('elementPhotos.update');
Route::delete('elementPhotos/{elementPhotos}', [App\Http\Controllers\ElementPhotoController::class,'destroy'])->name('elementPhotos.destroy');

// Route for ElementDocumentController
//Route::resource('elementDocuments', 'App\Http\Controllers\ElementDocumentController');
Route::get('elementDocuments', [App\Http\Controllers\ElementDocumentController::class,'index'])->name('elementDocuments.index');
Route::get('elementDocuments/create/{element_id?}', [App\Http\Controllers\ElementDocumentController::class,'create'])->name('elementDocuments.create');
Route::post('elementDocuments', [App\Http\Controllers\ElementDocumentController::class,'store'])->name('elementDocuments.store');
Route::get('elementDocuments/{elementDocuments}', [App\Http\Controllers\ElementDocumentController::class,'show'])->name('elementDocuments.show');
Route::get('elementDocuments/{elementDocuments}/edit', [App\Http\Controllers\ElementDocumentController::class,'edit'])->name('elementDocuments.edit');
Route::put('elementDocuments/{elementDocuments}', [App\Http\Controllers\ElementDocumentController::class,'update'])->name('elementDocuments.update');
Route::delete('elementDocuments/{elementDocuments}', [App\Http\Controllers\ElementDocumentController::class,'destroy'])->name('elementDocuments.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
