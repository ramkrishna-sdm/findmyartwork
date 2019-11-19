<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'category', 'sub_category', 'style', 'subject', 'gallery_user_id', 'is_deleted', 'is_active',
    ];

    // Relations with GalleryUser Model
    public function artist()
    {
        return $this->belongsTo('App\GalleryUser','gallery_user_id','id');
    }
    // Relations with ArtworkImage Model
    public function artwork_images()
    {
        return $this->hasMany('App\ArtworkImage','artwork_id','id');
    }
    // Relations with Variant Model
    public function variants()
    {
        return $this->hasMany('App\Variant','artwork_id','id');
    }
}
