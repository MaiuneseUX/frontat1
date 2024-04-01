<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TrackController;

Route::get('/albums', [AlbumController::class, 'index']);
Route::get('/albums/{album}', [AlbumController::class, 'show']);
Route::post('/albums', [AlbumController::class, 'store']);
Route::delete('/albums/{album}', [AlbumController::class, 'destroy']);

Route::post('/albums/{album}/tracks', [TrackController::class, 'store']);
Route::delete('/tracks/{track}', [TrackController::class, 'destroy']);
