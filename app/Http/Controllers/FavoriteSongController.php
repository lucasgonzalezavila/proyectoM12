<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoritesongs;

class FavoriteSongController extends Controller
{
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'song_id' => 'required|exists:songs,id',
        ]);

        // Verificar si el usuario ya tiene la canción como favorita
        $existingFavorite = Favoritesongs::where('user_id', auth()->id())
                                        ->where('song_id', $request->song_id)
                                        ->exists();

        if ($existingFavorite) {
            // La canción ya es favorita del usuario
            return response()->json(['message' => 'La canción ya es favorita.'], 422);
        }

        // Crear un nuevo favorito
        $favorite = new Favoritesongs();
        $favorite->user_id = auth()->id(); // ID del usuario autenticado
        $favorite->song_id = $request->song_id;
        $favorite->save();

        // Redireccionar o devolver una respuesta JSON según sea necesario
    }
}
