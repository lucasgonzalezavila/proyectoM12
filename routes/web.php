<?php

use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\AddDetailsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FavoriteSongController;
use App\Http\Controllers\FavoriteAlbumController;
use App\Http\Controllers\FavoritePlaylistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/cancion/{id}', [HomeController::class, 'mostrarCancion'])->name('cancion');
    Route::get('/album/{id}', [AlbumController::class, 'index'])->name('album');
    Route::get('/playlist/{id}', [PlaylistController::class, 'index'])->name('playlist');
    Route::get('/search/{name}', [PerfilController::class, 'show'])->name('dashboard');

    Route::post('/favorite-songs', [FavoriteSongController::class, 'store'])->name('favorite.songs.store');
    Route::post('/favorite-album', [FavoriteAlbumController::class, 'store'])->name('favorite.album.store');
    Route::post('/favorite-playlist', [FavoritePlaylistController::class, 'store'])->name('favorite.playlist.store');
});


Route::get('/profile', [PerfilController::class, 'index'])->middleware(['auth', 'verified'])->name('profile');


Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => function ($request, $next) {
        if (Auth::check() && Auth::user()->role === 'artista') {
            return $next($request);
        }
        return redirect('/')->with('error', 'No tienes permiso para acceder a esta página.');
    }], function () {
        Route::get('/add_song', [SongController::class, 'showAddSongForm'])->name('add_song_form');
        Route::post('/add_song', [SongController::class, 'addSong'])->name('add_song');
        
    });
});

Route::get('/artistas', [PerfilController::class, 'printArtists']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/settings', [SettingsController::class, 'edit'])->name('profile.edit');
    Route::patch('/settings', [SettingsController::class, 'update'])->name('profile.update');
    Route::delete('/settings', [SettingsController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => function ($request, $next) {
        if (Auth::check() && Auth::user()->role === 'user') {
            return $next($request);
        }
        return redirect('/')->with('error', 'No tienes permiso para acceder a esta página.');
    }], function () {
        Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
        Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
        Route::get('/albums/add-song', [AlbumController::class, 'showAddSongForm'])->name('albums.showAddSongForm');
        Route::post('/albums/add-song', [AlbumController::class, 'addSong'])->name('albums.addSong');
    });
});

Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
Route::get('/playlists/add-song', [PlaylistController::class, 'showAddSongForm'])->name('playlists.showAddSongForm');
Route::post('/playlists/add-song', [PlaylistController::class, 'addSong'])->name('playlists.addSong');

require __DIR__.'/auth.php';
