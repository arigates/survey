<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\SurveyController;
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
Route::delete('/survey/{id}/delete', [SurveyController::class, 'delete'])->name('survey.delete');

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/datatable', [ArticleController::class, 'datatable'])->name('article.data');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/{id}/show', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::post('/article/{id}/update', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/article/{id}/delete', [ArticleController::class, 'delete'])->name('article.delete');

Route::post('/storage/upload', [StorageController::class, 'upload'])->name('storage.upload');
Route::get('/storage/{path}/{file}', [StorageController::class, 'show'])->name('storage.show');
Route::delete('/storage-delete/{path}/{file}', [StorageController::class, 'delete'])->name('storage.delete');
