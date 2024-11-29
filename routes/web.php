<?php

use App\Livewire\ArticleIndex;
use App\Livewire\ArticleList;
use App\Livewire\CreateArticle;
use App\Livewire\Dashboard;
use App\Livewire\EditArticle;
use App\Livewire\ShowArticle;
use Illuminate\Support\Facades\Route;

Route::get('/', ArticleIndex::class);

Route::get('/articles/{article}', ShowArticle::class);

Route::get('/dashboard', Dashboard::class);
Route::get('/dashboard/articles', ArticleList::class)->name('dashboard.articles.list');
Route::get('/dashboard/articles/create', CreateArticle::class)->name('dashboard.articles.create');
Route::get('/dashboard/articles/{article}/edit', EditArticle::class)->name('dashboard.articles.edit');

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
