<?php

namespace App;

//use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    //use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'first_name', 'last_name', 'email', 'password',
        'address_street', 'address_number', 'address_postcode', 'address_location', 'address_country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    protected $dates = ['deleted_at'];

    // One User has many Products

    /*** Relationship Products ***/

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
