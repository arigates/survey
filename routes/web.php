<?php

use App\Http\Controllers\SurveyController;
use App\Models\SurveyDetail;
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

Route::get('/surveys', [SurveyController::class, 'index']);
Route::get('/survey/datatable', [SurveyController::class, 'datatable'])->name('survey.data');
Route::get('/survey/create', [SurveyController::class, 'create'])->name('survey.create');
Route::post('/survey/store', [SurveyController::class, 'store'])->name('survey.store');
Route::get('/survey/{id}/show', [SurveyController::class, 'show'])->name('survey.show');
Route::get('/survey/{id}/edit', [SurveyController::class, 'edit'])->name('survey.edit');
Route::post('/survey/{id}/update', [SurveyController::class, 'update'])->name('survey.update');
