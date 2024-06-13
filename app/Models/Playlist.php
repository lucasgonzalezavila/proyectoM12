<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Songs;

class Playlist extends Model{
    protected $table = 'playlist';
    protected $fillable = [
        'name', 'duration', 'artists', 'release_date', 'front',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function songs(){
        return $this->belongsToMany(Songs::class, 'playlist_songs', 'playlist_id', 'song_id');
    }
}
