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
                                            ->first();

        if ($existingFavorite) {
            // Si la lista de reproducción ya es favorita, eliminarla de la lista de favoritos
            $existingFavorite->delete();
            return redirect()->back()->with('success', 'La lista de reproducción ha sido eliminada de tus favoritos.');
        }

        // Crear un nuevo favorito de lista de reproducción
        $favorite = new Favoriteplaylist();
        $favorite->user_id = auth()->id(); // ID del usuario autenticado
        $favorite->playlist_id = $request->playlist_id;
        $favorite->save();

        // Redireccionar de vuelta a la vista de detalles de la lista de reproducción con un mensaje de éxito
        return redirect()->back()->with('success', 'La lista de reproducción ha sido agregada a tus favoritos.');
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
            return redirect()->back()->with('success', 'La lista de reproducción ha sido eliminada de tus favoritos.');
        } else {
            return redirect()->back()->withErrors('La lista de reproducción no se encontró en tus favoritos.');
        }
    }
}
