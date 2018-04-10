<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';

    protected $fillable = [
        'date',
        'value',
        'status',
    ];

    // Many to one, many bids belong to one product
    /*** Relationship Products ***/
    public function product() {

        return $this->belongsTo('App\Product');
    }
}
