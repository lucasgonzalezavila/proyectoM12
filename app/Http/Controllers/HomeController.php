<?php

namespace App\Http\Controllers;

use App\Models\Songs;
use App\Models\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($offset = 0)
    {
        $albumes = Album::all();

        // Obtén las canciones en bloques de 3, comenzando desde el índice proporcionado
        $canciones = Songs::all();

        return view('welcome', ['canciones' => $canciones], ['albumes' => $albumes]);
    }

    public function mostrarCancion($id)
    {
        // Buscar la canción por su ID en la base de datos
        $cancion = Songs::find($id);

        if (!$cancion) {
            // Manejar el caso en el que la canción no se encuentre
            abort(404);
        }

        // Retornar la vista de los detalles de la canción, pasando la canción como dato
        return view('cancion', compact('cancion'));
    }

    public function mostrarAlbum(Request $request) {

    }
}