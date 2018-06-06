<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    // protected $table = 'users';

    public function toArray($request)
    {
        //return parent::toArray($request);


        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password,

            'address_street' => $this->address_street,
            'address_number' => $this->address_number,
            'address_postcode' => $this->address_postcode,
            'address_location' => $this->address_location,
            'address_country' => $this->address_country,
        ];


    }

    // Extra data toevoegen
    public function with($request) {
        return [
            'version' => '1.0.0',
        ];
    }
}
