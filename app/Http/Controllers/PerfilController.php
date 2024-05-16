<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Favoritesongs;
use App\Models\Favoritealbum;
use App\Models\Favoriteplaylist;
use App\Models\Songs;
use App\Models\Album;
use App\Models\Playlist;

class PerfilController extends Controller
{
    public function show($name)
    {
        // Intentar obtener el usuario por su nombre
        $user = User::where('name', $name)->first();

        // Verificar si el usuario existe
        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        if ($user->role === 'user') {
            // Obtener las canciones favoritas del usuario
            $favoriteSongs = Favoritesongs::where('user_id', $user->id)->get();
            $songs = [];
            foreach ($favoriteSongs as $favoriteSong) {
                $song = Songs::find($favoriteSong->song_id);
                if ($song) {
                    $songs[] = $song;
                }
            }

            // Obtener los álbumes favoritos del usuario
            $favoriteAlbums = Favoritealbum::where('user_id', $user->id)->get();
            $albums = [];
            foreach ($favoriteAlbums as $favoriteAlbum) {
                $album = Album::find($favoriteAlbum->album_id);
                if ($album) {
                    $albums[] = $album;
                }
            }

            // Obtener las listas de reproducción favoritas del usuario
            $favoritePlaylists = Favoriteplaylist::where('user_id', $user->id)->get();
            $playlists = [];
            foreach ($favoritePlaylists as $favoritePlaylist) {
                $playlist = Playlist::find($favoritePlaylist->playlist_id);
                if ($playlist) {
                    $playlists[] = $playlist;
                }
            }

            // Pasar las canciones, álbumes y listas de reproducción a la vista
            return view('search', compact('user', 'songs', 'albums', 'playlists'));
        } else {
            // Obtener las canciones del usuario
            $songs = Songs::where('user_id', $user->id)->get();
            // Obtener los álbumes del usuario
            $albums = Album::where('user_id', $user->id)->get();
            // Obtener las listas de reproducción del usuario
            $playlists = Playlist::where('user_id', $user->id)->get();

            return view('search', compact('user', 'songs', 'albums', 'playlists'));
        }
    }

    public function printArtists()
    {
        // Obtener todos los nombres de los artistas con rol 'artista'
        $artists = User::where('role', 'artista')->pluck('name')->toArray();

        // Pasar los nombres de los artistas a la vista y renderizar la vista
        return view('artistas', ['artists' => $artists]);
    }
    public function index(){
        // Obtener el usuario actualmente autenticado
        $user = auth()->user();
        
        // Verificar si el usuario tiene el rol de 'artista'
        if ($user->role === 'artista') {
            // Obtener las canciones del usuario
            $songs = Songs::where('user_id', $user->id)->get();
            // Obtener los álbumes del usuario
            $albums = Album::where('user_id', $user->id)->get();
            // Obtener las listas de reproducción del usuario
            $playlists = Playlist::where('user_id', $user->id)->get();

            // Pasar las canciones, álbumes y listas de reproducción a la vista
            return view('profile', compact('user', 'songs', 'albums', 'playlists'));
        }

        // Verificar si el usuario tiene el rol de 'user'
        if ($user->role === 'user') {
            // Obtener las canciones favoritas del usuario
            $favoriteSongs = Favoritesongs::where('user_id', $user->id)->get();
            $songs = [];
            foreach ($favoriteSongs as $favoriteSong) {
                $song = Songs::find($favoriteSong->song_id);
                if ($song) {
                    $songs[] = $song;
                }
            }

            // Obtener los álbumes favoritos del usuario
            $favoriteAlbums = Favoritealbum::where('user_id', $user->id)->get();
            $albums = [];
            foreach ($favoriteAlbums as $favoriteAlbum) {
                $album = Album::find($favoriteAlbum->album_id);
                if ($album) {
                    $albums[] = $album;
                }
            }

            // Obtener las listas de reproducción favoritas del usuario
            $favoritePlaylists = Favoriteplaylist::where('user_id', $user->id)->get();
            $playlists = [];
            foreach ($favoritePlaylists as $favoritePlaylist) {
                $playlist = Playlist::find($favoritePlaylist->playlist_id);
                if ($playlist) {
                    $playlists[] = $playlist;
                }
            }

            // Pasar las canciones, álbumes y listas de reproducción a la vista
            return view('profile', compact('user', 'songs', 'albums', 'playlists'));
        }

        // En caso de que el usuario no tenga un rol específico, redirigir con un error
        return redirect()->back()->with('error', 'Rol de usuario no reconocido.');
    }

}
