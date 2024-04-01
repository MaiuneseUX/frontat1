<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TrackController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');
Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');
Route::get('/albums/search', [AlbumController::class, 'search'])->name('albums.search');

Route::post('/albums/{album}/tracks', [TrackController::class, 'store'])->name('tracks.store');
Route::delete('/tracks/{track}', [TrackController::class, 'destroy'])->name('tracks.destroy');
