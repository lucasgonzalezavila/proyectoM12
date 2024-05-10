<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Songs extends Model{
    protected $table = 'songs';
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function favoriteSong()
    {
        return $this->hasOne(Favoritesongs::class);
    }
}

