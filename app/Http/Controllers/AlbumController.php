<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Song;
use App\Models\Favoritealbum;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index($id)
    {
        // Buscar el álbum por su ID
        $album = Album::find($id);

        // Verificar si el álbum existe
        if ($album) {
            // Obtener las canciones asociadas al álbum utilizando la relación pivot
            $songs = $album->songs()->get();

            // Verificar si el álbum es favorito del usuario
            $isFavorite = Favoritealbum::where('user_id', auth()->id())
                                       ->where('album_id', $id)
                                       ->exists();

            // Pasar los datos del álbum, las canciones y el estado de favorito a la vista
            return view('album', compact('album', 'songs', 'isFavorite'));
        } else {
            // Redirigir si el álbum no se encuentra
            return redirect("/");
        }
    }

    public function create()
    {
        // Verificar si el usuario es un artista
        if (auth()->check() && auth()->user()->role === 'artista') {
            return view('create_album');
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|numeric|min:0', // Duración no negativa
            'front' => 'required|image|max:2048', // Validar que sea una imagen y tamaño máximo 2MB
            'release_date' => ['required', 'date', function ($attribute, $value, $fail) {
                if ($value > now()->format('Y-m-d')) {
                    $fail('La fecha de lanzamiento no puede ser posterior a la fecha actual.');
                }
            }],
            'artists' => 'required|string|max:255',
        ]);

        // Guardar la imagen de portada
        $frontPath = $request->file('front')->store('public/fronts');
        $frontFilename = basename($frontPath);

        // Crear el nuevo álbum
        $album = new Album();
        $album->name = $request->name;
        $album->duration = $request->duration;
        $album->front = $frontFilename; // Asignar la imagen de portada
        $album->release_date = $request->release_date;
        $album->artists = $request->artists;
        $album->user_id = auth()->id(); // Asignar el ID del usuario autenticado
        $album->save();

        return redirect("/album/{$album->id}");
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
        $song = Song::where('title', $request->song_title)->first();
        if (!$song) {
            return redirect()->route('albums.showAddSongForm')->withErrors(['song_title' => 'Canción no encontrada']);
        }

        // Asociar la canción al álbum
        $album->songs()->attach($song->id);

        return redirect()->route('albums.showAddSongForm')->with('success', 'Canción añadida al álbum correctamente');
    }
}
