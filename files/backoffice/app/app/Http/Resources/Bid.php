<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Bid extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $table = 'bids';

    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'date' => $this->date,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'value' => $this->value,
            'status' => $this->status,  
        ];
    }

    // Extra data toevoegen
    public function with($request) {
        return [
            'version' => '1.0.0',
        ];
    }
}
