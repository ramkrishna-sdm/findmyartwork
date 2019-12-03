<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedArtwork extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'artwork_id', 'status', 
    ];

    // Relations with Category Model
    public function users()
    {
        return $this->hasMany('App\User','user_id','id');
    }
}
