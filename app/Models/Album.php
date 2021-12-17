<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = "albums";
    protected $fillable = ['band_id', 'name', 'year', 'times_sold'];

    /**
     * Get the band that owns the album.
     */
    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    /**
    * Get the albums for the songs.
    */
   public function songs()
   {
       return $this->belongsToMany(Song::class);
   }
}
