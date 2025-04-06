<?php

use App\Models\Article;
use App\Livewire\ArticleEdit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
//! Ricerca
Route::get('/article/search', [PublicController::class, 'searchArticles'])->name('article.search');
//! Cambio Lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

//! ArticleController
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/byCategory/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/edit/{article}', ArticleEdit::class)->name('article.edit')->middleware('auth');
//! RevisorController
Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index')->middleware('isRevisor');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept')->middleware('isRevisor');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject')->middleware('isRevisor');
//! Mail
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('become.revisor')->middleware('auth');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
