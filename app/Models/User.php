<?php

namespace App\Models;



use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Song;


class User extends Authenticatable
{

    use HasFactory, Notifiable;


    protected $fillable = [
        'username',
        'password',
        'avatar',
        'wallpaper'
    ];


    protected $hidden = [
        'password'
    ];

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'song_user');
    }
}
