<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteAlbum;

class FavoriteAlbumController extends Controller
{
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'album_id' => 'required|exists:albums,id',
        ]);

        // Verificar si el álbum ya es favorito del usuario
        $existingFavorite = FavoriteAlbum::where('user_id', auth()->id())
                                          ->where('album_id', $request->album_id)
                                          ->exists();

        if ($existingFavorite) {
            // El álbum ya es favorito del usuario
            return response()->json(['message' => 'El álbum ya es favorito.'], 422);
        }

        // Crear un nuevo favorito de álbum
        $favorite = new FavoriteAlbum();
        $favorite->user_id = auth()->id(); // ID del usuario autenticado
        $favorite->album_id = $request->album_id;
        $favorite->save();

        // Redireccionar o devolver una respuesta JSON según sea necesario
    }

    public function destroy(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'album_id' => 'required|exists:albums,id',
        ]);

        // Buscar y eliminar el favorito de álbum
        $favorite = FavoriteAlbum::where('user_id', auth()->id())
                                 ->where('album_id', $request->album_id)
                                 ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'El álbum se eliminó de los favoritos correctamente.']);
        } else {
            return response()->json(['message' => 'El álbum no se encontró en los favoritos.'], 404);
        }
    }
}
