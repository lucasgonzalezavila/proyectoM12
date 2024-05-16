<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_songs extends Model{
    
    protected $table = 'album_songs';
    
    use HasFactory;
    
    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function song(){
        return $this->belongsTo(Songs::class);
    }
}
