<?php

namespace App\Http\Controllers;

use App\Models\Songs;
use App\Models\Album;
use App\Models\Playlist;
use App\Models\Favoritesongs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($offset = 0)
    {
        $albumes = Album::all();
        $canciones = Songs::all();
        $playlists = Playlist::all();

        return view('welcome', [
            'canciones' => $canciones,
            'albumes' => $albumes,
            'playlists' => $playlists,
        ]);
    }

    public function mostrarCancion($id)
    {
        $cancion = Songs::find($id);

        if (!$cancion) {
            // Manejar el caso en el que la canción no se encuentre
            abort(404);
        }

        $user_id = auth()->id();
        $isFavorite = Favoritesongs::where('user_id', $user_id)->where('song_id', $id)->exists();

        return view('cancion', compact('cancion', 'isFavorite'));
    }
}
