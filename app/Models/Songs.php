<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Songs extends Model{
    protected $table = 'songs';
    public $timestamps = false;
    
    protected $fillable = [
        'title', 'user_id', 'duration', 'front', 'genre', 'release_date', 'artists', 'song_route',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function favoriteSong()
    {
        return $this->hasOne(Favoritesongs::class);
    }
}

