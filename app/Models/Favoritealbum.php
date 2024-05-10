<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoritealbum extends Model{
    use HasFactory;
    protected $table = 'favorite_album';
    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function song(){
        return $this->belongsTo(Songs::class);
    }
}
