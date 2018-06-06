import { Bid } from './bid';
export class Auction {
    id: number;
    productName: string;
    productDescription: string;
    // picture: string; // temporarily string , should be Medium ?
    // start_of_bid_period: string;
    productOwner: string;
    productLocation: string;
    latestBid: string;
    bid: Bid ;
    categoryName: string ;
    start_of_bid_period: string;
    end_of_bid_period: string;
}
