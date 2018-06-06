import { Medium } from './medium';
import { User } from './user';
import { Product } from './product';
import {Category} from './category';

export class Bid {
    id: string;
    date: string;
    user_id: number;
    product_id: number;
    value: number;
    status: string;
    // created_at: Date; // Created at server side
    // updated_at: Date; // Created at server side
}
