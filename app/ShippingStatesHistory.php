<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingStatesHistory extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shipping_id', 'state_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

}
