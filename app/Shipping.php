<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'contact_person', 'address','cp', 'city', 
        'state', 'country', 'telephone', 'email',
        'fragile', 'size', 'weight', 'number', 'delivery_date'
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

}
