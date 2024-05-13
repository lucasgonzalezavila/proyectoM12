<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\AddDetailsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FavoriteSongController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SongController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login1',[LoginController::class, 'index']);

Route::get('/cancion/{id}', [HomeController::class, 'mostrarCancion'])->name('cancion');

Route::get('/album/{id}', [AlbumController::class, 'index']);

Route::get('/search/{name}', [ArtistaController::class, 'show'] )->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/favorite-songs', [FavoriteSongController::class, 'store'])->name('favorite.songs.store');

Route::get('/artista', [ArtistaController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user', [UserController::class, 'index'])->name('user');

Route::middleware(['auth'])->group(function () {
    Route::get('/add_song', [SongController::class, 'showAddSongForm'])->name('add_song_form');
    Route::post('/add_song', [SongController::class, 'addSong'])->name('add_song');
});

Route::get('/artistas', [ArtistaController::class, 'printArtists']);


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
