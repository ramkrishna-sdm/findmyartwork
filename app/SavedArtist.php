<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedArtist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'artist_id', 'status', 'guest_id'
    ];

    // Relations with Category Model
    public function users()
    {
        return $this->hasMany('App\User','user_id','id');
    }

    public function artworks()
    {
        return $this->hasMany('App\Artwork','user_id','id');
    }
}
