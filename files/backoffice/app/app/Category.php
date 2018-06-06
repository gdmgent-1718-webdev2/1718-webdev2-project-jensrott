<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product as Product;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'picture',
        'description',
    ];

    /**
     * Get the product that belong to a category.
     * One category has many products
     */

    /*** Relationship Products ***/
    public function products() {

        return $this->hasMany(Product::class);
    }

}
