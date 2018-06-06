import { Medium } from './medium';
import { User } from './user';
import { Category } from './category';

export class Product {
    id: number;
    name: string;
    description: string;
    picture: string; // temporarily string , should be Medium ?
    start_of_bid_period: string;
    end_of_bid_period: string;
    user_id: number; // temporarily only id ; in a later stage a user model ?
   // created_at: Date; // Is created at server side
   // updated_at: Date; // Is created at server side
    category_id: number; // temporarily only id ; in a later stage a category model 
}
