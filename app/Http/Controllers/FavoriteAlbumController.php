<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoritealbum;

class FavoriteAlbumController extends Controller
{
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'album_id' => 'required|exists:album,id',
        ]);

        // Verificar si el álbum ya es favorito del usuario
        $existingFavorite = FavoriteAlbum::where('user_id', auth()->id())
                                          ->where('album_id', $request->album_id)
                                          ->exists();

        if ($existingFavorite) {
            // El álbum ya es favorito del usuario
            return redirect()->back()->with('error', 'El álbum ya es favorito.');
        }

        // Crear un nuevo favorito de álbum
        $favorite = new FavoriteAlbum();
        $favorite->user_id = auth()->id(); // ID del usuario autenticado
        $favorite->album_id = $request->album_id;
        $favorite->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->back()->with('success', 'El álbum se ha añadido a tus favoritos.');
    }

    public function destroy(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'album_id' => 'required|exists:album,id',
        ]);

        // Buscar y eliminar el favorito de álbum
        $favorite = Favoritealbum::where('user_id', auth()->id())
                                 ->where('album_id', $request->album_id)
                                 ->first();

        if ($favorite) {
            $favorite->delete();
            return redirect()->back()->with('success', 'El álbum se eliminó de los favoritos correctamente.');
        } else {
            return redirect()->back()->with('error', 'El álbum no se encontró en los favoritos.');
        }
    }
}
