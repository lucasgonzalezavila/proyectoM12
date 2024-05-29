<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Songs;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller{

    public function index($id)
    {
        // Buscar el álbum por su ID
        $album = Album::find($id);

        // Verificar si el álbum existe
        if ($album) {
            // Obtener las canciones asociadas al álbum utilizando la relación pivot
            $songs = $album->songs()->get();

            // Pasar los datos del álbum y las canciones a la vista
            return view('album', compact('album', 'songs'));
        } else {
            // Redirigir si el álbum no se encuentra
            return redirect()->route('albums.albumNoEncontrado');
        }
    }

    public function albumNoEncontrado()
    {
        return view('album_no_encontrado');
    }

    public function create()
    {
        return view('create_album');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|numeric',
            'front' => 'required|string|max:255',
            'release_date' => 'required|date',
            'artists' => 'required|string|max:255',
            // Agrega aquí las reglas de validación para otros campos del formulario si es necesario
        ]);

        $user_id = auth()->id(); // Obtiene el ID del usuario autenticado

        $album = new Album();
        $album->name = $request->name;
        $album->duration = $request->duration;
        $album->front = $request->front;
        $album->release_date = $request->release_date;
        $album->artists = $request->artists;
        $album->user_id = $user_id; // Asigna el ID del usuario autenticado al álbum
        // Completa con otros campos del álbum si es necesario

        $album->save();

        return redirect()->route('albums.create')->with('success', 'Álbum creado correctamente');
    }

    public function showAddSongForm()
    {
        return view('add_song_to_album');
    }

    public function addSong(Request $request)
    {
        $request->validate([
            'album_name' => 'required|string|max:255',
            'song_title' => 'required|string|max:255',
        ]);

        // Buscar el álbum por nombre
        $album = Album::where('name', $request->album_name)->first();
        if (!$album) {
            return redirect()->route('albums.showAddSongForm')->withErrors(['album_name' => 'Álbum no encontrado']);
        }

        // Buscar la canción por título
        $song = Songs::where('title', $request->song_title)->first();
        if (!$song) {
            return redirect()->route('albums.showAddSongForm')->withErrors(['song_title' => 'Canción no encontrada']);
        }

        // Asociar la canción al álbum
        $album->songs()->attach($song->id);

        return redirect()->route('albums.showAddSongForm')->with('success', 'Canción añadida al álbum correctamente');
    }
}
