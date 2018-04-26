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

        /* Test User */
        $testuser = [];
        $testuser[] = [
            'user_name' => 'Jens',
            'first_name' => 'Jens',
            'last_name' => 'Rottiers',
            'email' => 'jens.rottiers@test.be',
            //'cover_image' => $faker->image('public/images', 200, 200, 'cats', false),
            'address_street' => 'TestStreet',
            'address_number' => 20,
            'address_postcode' => 1234,
            'address_location' => 'TestCity',
            'address_country' => 'TestCountry',
            'password' => bcrypt('654321'),
            //'created_at' => new DateTime(),
        ];

       $testuser[] = [
            'user_name' => 'John',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@test.be',
            //'cover_image' => $faker->image('public/images', 200, 200, 'cats', false),
            'address_street' => 'TestStreet',
            'address_number' => 20,
            'address_postcode' => 1234,
            'address_location' => 'TestCity',
            'address_country' => 'TestCountry',
            'password' => bcrypt('654321'),
            //'created_at' => new DateTime(),
        ];

        for($i = 0; $i <= 4; $i++) {
            DB::table(self::TABLE)->insert($testuser);
        }
    }
}
