<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class albumsong extends Model
{
    use HasFactory;

    protected $table = "album_song";
    protected $fillable = ['album_id', 'song_id'];

    /**
     * Get the album_id associated with the album.
     */
    public function albums()
    {
        return $this->hasOne(Album::class);
    }

    /**
     * Get the song_id associated with the song.
     */
    public function songs()
    {
        return $this->hasOne(Song::class);
    }
}
