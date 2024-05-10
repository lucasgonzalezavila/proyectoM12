<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoritesongs;
use App\Models\Songs;

class DashboardController extends Controller
{
    public function index(){
        $user = auth()->user();
        $favoriteSongs = Favoritesongs::where('user_id', $user->id)->get();
        $songs = [];
        foreach ($favoriteSongs as $favoriteSong) {
            $song = Songs::find($favoriteSong->song_id);
            if ($song) {
                $songs[] = $song;
            }
        }
        return view('dashboard', ['favoriteSongs' => $songs]);
    }
}
