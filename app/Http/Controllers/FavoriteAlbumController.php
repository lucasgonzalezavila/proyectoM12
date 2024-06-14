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
        $existingFavorite = Favoritealbum::where('user_id', auth()->id())
                                         ->where('album_id', $request->album_id)
                                         ->first();

        if ($existingFavorite) {
            // El álbum ya es favorito del usuario, devolver un mensaje de error
            $existingFavorite->delete();
            return redirect()->back()->with('success', 'El Album ha sido eliminada de tus favoritos.');
        }

        // Crear un nuevo favorito de álbum
        $favorite = new Favoritealbum();
        $favorite->user_id = auth()->id(); // ID del usuario autenticado
        $favorite->album_id = $request->album_id;
        $favorite->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->back()->with('success', 'El álbum se ha añadido a tus favoritos.');
    }
}
