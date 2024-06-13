<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class selectaddController extends Controller{

    public function index(){
        return view('select_add_form');
    }
    
    public function SelectAddView (Request $request){
        $view = $request->input('add_view');

        switch ($view) {
            case 'Playlist':
                return redirect("/playlists/create");
            case 'Song':
                return redirect("/add_song");
            case 'Album':
                return redirect("/albums/create");
            default:
                return back()->with('error', 'Opción no válida');
        }
    }
}
