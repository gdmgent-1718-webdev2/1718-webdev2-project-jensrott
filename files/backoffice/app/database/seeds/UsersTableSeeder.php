<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const TABLE = 'users';

    public function run(Faker $faker)
    {
        for($i = 0; $i <= 9; $i++) {
            DB::table(self::TABLE)->insert([
                'user_name' => $faker->userName,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,

                'address_street' => $faker->streetAddress,
                'address_number' => $faker->randomNumber(3, true),
                'address_postcode' => $faker->postcode,
                'address_location' => $faker->city, // Later afleiden van u postcode.
                'address_country' => $faker->country,

                'password' => password_hash($faker->password, PASSWORD_DEFAULT),
            ]);
        }
    }
}
