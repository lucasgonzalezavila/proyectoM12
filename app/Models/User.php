<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Favoritesongs;

class User extends Authenticatable{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array{
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function Favoritesongs(){
        return $this->hasMany(Favoritesongs::class);
    }
    public function Favoritealbums(){
        return $this->hasMany(Favoritealbum::class);
    }
    public function favoritePlaylists(){
        return $this->belongsToMany(Playlist::class, 'favorite_playlist');
    }

    public function playlists(){
    return $this->hasMany(Playlist::class);
    }
    public function hasRole($role){
        return $this->role === $role;
    }

    
}
