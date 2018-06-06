<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product as Product;
use App\User as User;

class Bid extends Model
{
    protected $table = 'bids';

    protected $fillable = [
        'date',
        'value',
        'status',
        'user_id',
        'product_id'
    ];

    // Many to one, many bids belong to one product (one can bid multiple times on a product)
    /*** Relationship Products ***/
    public function product() {

        //return $this->belongsTo(Product::class);
        return $this->belongsTo('App\Product','product_id', 'id');
    }
    // Many to one, many bids belong to one user (one user can bid multiple times)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
