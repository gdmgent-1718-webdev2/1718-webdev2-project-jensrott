<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Bid as BidResource;

class Auctions extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
        'id' => $this->id,
        'productName' => $this->name,
        'productDescription' => $this->description,
        'productOwner' => $this->user->user_name,
        'productLocation' => $this->user->address_location,
        'latestBid' => $this->bids->max("value"),
        'bids' => $this->bids,
        'categoryName' => $this->category->name,
        'start_of_bid_period' => $this->start_of_bid_period,
        'end_of_bid_period' => $this->end_of_bid_period,
        ];


    }
}
