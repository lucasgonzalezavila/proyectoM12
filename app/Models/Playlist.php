<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model{
    protected $table = 'playlist';
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function songs(){
        return $this->belongsToMany(Songs::class);
    }
}
