<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Songs;

class SongController extends Controller
{
    public function showAddSongForm()
    {
        return view('add_song_form');
    }

    public function addSong(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'duration' => 'required|numeric',
            'front' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genre' => 'required|string',
            'release_date' => 'required|date',
            'artists' => 'required|string',
            'song_route' => 'required|file|mimes:mp3,wav,aac|max:20480', // Máximo 20 MB
        ]);

        $user_id = auth()->id();

        // Almacenar la portada
        $frontPath = $request->file('front')->store('public/fronts');

        // Almacenar la canción
        $songPath = $request->file('song_route')->store('public/songs');

        // Obtener los nombres de archivo
        $frontFilename = basename($frontPath);
        $songFilename = basename($songPath);

        // Guardar los datos en la base de datos
        Songs::create([
            'title' => $request->title,
            'user_id' => $user_id,
            'duration' => $request->duration,
            'front' => $frontFilename,
            'genre' => $request->genre,
            'release_date' => $request->release_date,
            'artists' => $request->artists,
            'song_route' => $songFilename,
        ]);

        return redirect()->route('home')->with('success', 'Canción añadida correctamente.');
    }
}