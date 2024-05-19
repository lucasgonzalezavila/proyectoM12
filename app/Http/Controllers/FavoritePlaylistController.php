<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoritePlaylist;

class FavoritePlaylistController extends Controller
{
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'playlist_id' => 'required|exists:playlists,id',
        ]);

        // Verificar si la playlist ya es favorita del usuario
        $existingFavorite = FavoritePlaylist::where('user_id', auth()->id())
                                          ->where('playlist_id', $request->playlist_id)
                                          ->exists();

        if ($existingFavorite) {
            // La playlist ya es favorita del usuario
            return response()->json(['message' => 'La playlist ya es favorita.'], 422);
        }

        // Crear un nuevo favorito de playlist
        $favorite = new FavoritePlaylist();
        $favorite->user_id = auth()->id(); // ID del usuario autenticado
        $favorite->playlist_id = $request->playlist_id;
        $favorite->save();

        // Redireccionar o devolver una respuesta JSON según sea necesario
        return response()->json(['message' => 'La playlist se agregó a los favoritos correctamente.']);
    }

    public function destroy(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'playlist_id' => 'required|exists:playlists,id',
        ]);

        // Buscar y eliminar el favorito de playlist
        $favorite = FavoritePlaylist::where('user_id', auth()->id())
                                 ->where('playlist_id', $request->playlist_id)
                                 ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'La playlist se eliminó de los favoritos correctamente.']);
        } else {
            return response()->json(['message' => 'La playlist no se encontró en los favoritos.'], 404);
        }
    }
}
