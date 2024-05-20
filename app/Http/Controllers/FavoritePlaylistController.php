<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoriteplaylist;

class FavoritePlaylistController extends Controller
{
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'playlist_id' => 'required|exists:playlist,id',
        ]);

        // Verificar si la lista de reproducción ya es favorita del usuario
        $existingFavorite = Favoriteplaylist::where('user_id', auth()->id())
                                          ->where('playlist_id', $request->playlist_id)
                                          ->exists();

        if ($existingFavorite) {
            // La lista de reproducción ya es favorita del usuario
            return redirect()->back()->with('status', '¡Esta Playlist ya está en tus favoritos!');
        }

        // Crear un nuevo favorito de lista de reproducción
        $favorite = new Favoriteplaylist();
        $favorite->user_id = auth()->id(); // ID del usuario autenticado
        $favorite->playlist_id = $request->playlist_id;
        $favorite->save();

        return redirect()->back()->with('status', '¡La Playlist se ha agregado a tus favoritos!');
    }

    public function destroy(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'playlist_id' => 'required|exists:playlists,id',
        ]);

        // Buscar y eliminar el favorito de lista de reproducción
        $favorite = FavoritePlaylist::where('user_id', auth()->id())
                                 ->where('playlist_id', $request->playlist_id)
                                 ->first();

        if ($favorite) {
            $favorite->delete();
            return redirect()->back()->with('status', '¡La lista de reproducción se ha eliminado de tus favoritos!');
        } else {
            return redirect()->back()->withErrors('La lista de reproducción no se encontró en tus favoritos.');
        }
    }
}
