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
        'offered_by',
        'start_of_bid_period',
        'end_of_bid_period',
    ];
}
