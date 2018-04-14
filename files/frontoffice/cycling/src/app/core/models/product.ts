import { Medium } from './medium';
import { User } from './user';
import { Category } from './category';

export class Product {
    id: string;
    name: string;
    description: string;
    picture: Medium;
    startBidPeriod: Date;
    endBidPeriod: Date;
    user: User;
    createdAt: number;
    updatedAt: number;
    category: Category;
}
