<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'picture',
        'description',
        'user_id',
        'category_id',
        'start_of_bid_period',
        'end_of_bid_period',
    ];

    /**
     * Get the category that belong to the product.
     * one category belongs to many products
     */

    /*** Relationship Categories ***/
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the user that belong to the product.
     * one user belongs to many products
     */

    /*** Relationship Users ***/
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the admin that belong to a product.
     * one admin belongs to many products
     */

    /*** Relationship Admins
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
     * ***/

    /**
     * Get the user that belong to the product.
     * one product belongs to many bids
     */

    /*** Relationship Bids ***/
    public function bid() {
        return $this->hasMany('App\Bid');
    }
}
