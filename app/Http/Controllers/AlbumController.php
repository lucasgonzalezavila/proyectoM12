<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album; // Importa el modelo Album

class AlbumController extends Controller {
    public function index($id) {
        // Busca el álbum por su nombre
        $Album = Album::where('id', $id)->first();

        // Verifica si se encontró el álbum
        if ($Album) {
            // Si se encontró, puedes pasar la información del álbum a la vista
            return view('album', ['album' => $album]);
        } else {
            echo "Album no encontrado";
        }
    }

    public function albumNoEncontrado() {
        return view('album_no_encontrado');
    }
}
