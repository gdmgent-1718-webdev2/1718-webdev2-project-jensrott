import { Address } from './address';

export class User {
    id: number;
    user_name: string;
    first_name: string;
    last_name: string;
    email: string;
    password: any;
    address: Address;
}
