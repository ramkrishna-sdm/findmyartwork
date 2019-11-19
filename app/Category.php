<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_deleted', 'is_active'
    ];

    // Relations with SubCategory Model
    public function subcategories()
    {
        return $this->hasMany('App\SubCategory','category_id','id');
    }
}
