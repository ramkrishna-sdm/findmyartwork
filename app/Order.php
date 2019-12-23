<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'artwork_id', 'artist_id', 'payment_id', 'delivery_address', 'status', 'paypal_response', 'artwork_info', 'shipping_status', 'tracking_number', 'carrier'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
