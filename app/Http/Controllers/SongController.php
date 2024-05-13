<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Songs;

class SongController extends Controller{
    public function showAddSongForm(){
        return view('add_song_form');
    }

    public function addSong(Request $request){
    $request->validate([
        'title' => 'required|string',
        'duration' => 'required|numeric',
        'front' => 'required|string|url',
        'genre' => 'required|string',
        'release_date' => 'required|date',
        'artists' => 'required|string',
        'song_route' => 'required|string|url',
    ]);

    $user_id = auth()->id();

    Songs::create([
        'title' => $request->title,
        'user_id' => $user_id, // Asignar el ID del usuario
        'duration' => $request->duration,
        'front' => $request->front, // Guardar la URL de la portada
        'genre' => $request->genre,
        'release_date' => $request->release_date,
        'artists' => $request->artists,
        'song_route' => $request->song_route, // Guardar la URL de la canción
    ]);

    return redirect()->route('home')->with('success', 'Canción añadida correctamente.');
    }

}
