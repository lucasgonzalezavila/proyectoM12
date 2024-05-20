<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Songs;

class PlaylistController extends Controller{

    public function index($id){
        // Buscar la playlist por su ID
        $playlist = Playlist::find($id);
    
        // Verificar si la playlist existe
        if ($playlist) {
            // Obtener las canciones asociadas a la playlist utilizando la relación pivot
            $songs = $playlist->songs()->get();
    
            // Pasar los datos de la playlist y las canciones a la vista
            return view('playlist', compact('playlist', 'songs'));
        } else {
            // Redirigir si la playlist no se encuentra
            return redirect()->route('albums.albumNoEncontrado');
        }
    }
    
    
    

    public function create(){
        return view('create_playlist');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $playlist = new Playlist();
        $playlist->name = $request->name;
        $playlist->user_id = auth()->id(); // assuming the user is authenticated
        $playlist->save();

        return redirect()->route('playlists.create')->with('success', 'Playlist created successfully');
    }

    public function showAddSongForm()
    {
        return view('add_song_to_playlist');
    }

    public function addSong(Request $request)
    {
        $request->validate([
            'playlist_name' => 'required|string|max:255',
            'song_title' => 'required|string|max:255',
        ]);

        // Buscar la playlist por nombre
        $playlist = Playlist::where('name', $request->playlist_name)->first();
        if (!$playlist) {
            return redirect()->route('playlists.showAddSongForm')->withErrors(['playlist_name' => 'Playlist not found']);
        }

        // Buscar la canción por título
        $song = Songs::where('title', $request->song_title)->first();
        if (!$song) {
            return redirect()->route('playlists.showAddSongForm')->withErrors(['song_title' => 'Song not found']);
        }

        // Asociar la canción a la playlist
        $playlist->songs()->attach($song->id);

        return redirect()->route('playlists.showAddSongForm')->with('success', 'Song added to playlist successfully');
    }
}
