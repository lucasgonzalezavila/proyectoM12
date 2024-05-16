<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model{
    use HasFactory;

    protected $table = 'album'; // Asumiendo que el nombre de la tabla es 'albums'
    protected $fillable = [
        'name',
        'user_id',
        'duration',
        'front',
        'release_date',
        'artists',
    ];

    public function songs() {
        return $this->belongsToMany(Songs::class, 'album_songs', 'album_id', 'song_id');
    }
    
}
