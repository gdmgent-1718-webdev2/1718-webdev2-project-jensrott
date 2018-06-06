<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'user_name' => $this->user->user_name,
            'picture' => $this->picture,
           //  'bids' => BidResource::collection($this->bids),
           // 'category_name' => $this->category->name,
            ];


    }
}
