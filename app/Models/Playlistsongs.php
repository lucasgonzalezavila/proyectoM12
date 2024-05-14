<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlistsongs extends Model{
    protected $table = 'playlist_songs';
    use HasFactory;
    public function playlist(){
        return $this->belongsTo(Playlist::class);
    }

    public function song(){
        return $this->belongsTo(Songs::class);
    }
}
