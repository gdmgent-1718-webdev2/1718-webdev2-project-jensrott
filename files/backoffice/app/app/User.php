<?php

namespace App;

use Illuminate\Notifications\Notifiable;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product as Product;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    //Add HasApiTokens to your User model (to use with eg passport, token-based authorization)
    // use HasApiTokens,Notifiable;
    use Notifiable;
    use SoftDeletes;
    protected $guard='api';


    // protected $guard = "api" ; (No need to add this ?)
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

    /*
    * Functions required for JWT token authentication
    *
    */
    public function getJWTIdentifier()
    {   return $this->getKey();

    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    // One User has many Products

    /*** Relationship Products ***/

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
