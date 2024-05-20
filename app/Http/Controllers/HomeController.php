<?php

namespace App\Http\Controllers;

use App\Models\Songs; 

class HomeController extends Controller{
    public function index($offset = 0) {
        // Obtén las canciones en bloques de 3, comenzando desde el índice proporcionado
        $canciones = Songs::skip($offset)->limit(3)->get();
        return view('welcome', compact('canciones', 'offset'));
    }
    
    public function mostrarCancion($id){
        // Buscar la canción por su ID en la base de datos
        $cancion = Songs::find($id);

        if (!$cancion) {
            // Manejar el caso en el que la canción no se encuentre
            abort(404);
        }

        // Retornar la vista de los detalles de la canción, pasando la canción como dato
        return view('cancion', compact('cancion'));
    }
}
