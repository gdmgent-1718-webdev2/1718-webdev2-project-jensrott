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

        $testuser = [];
        /* Test User */

        for($i = 0; $i <= 9; $i++) {
            $testname1 = 'Jens' . strval($i);
            $testname2 = 'John' . strval($i);
            $addressnumber = 1 + $i;
            $adresspostcode = 9230 + $i;
            $created_at = $faker->dateTimeBetween('2018-02-01', '2018-04-31');

            $testuser[] = [
                'user_name' => $testname1,
                'first_name' => $testname1,
                'last_name' => 'Rottiers',
                'email' => $testname1 . '.rottiers@test.be',
                //'cover_image' => $faker->image('public/images', 200, 200, 'cats', false),
                'address_street' => 'TestStreet',
                'address_number' => $addressnumber,
                'address_postcode' => $adresspostcode,
                'address_location' => 'TestCity',
                'address_country' => 'TestCountry',
                'password' => bcrypt('654321'),
                'created_at' => $created_at,
            ];

           $testuser[] = [
                'user_name' => $testname2,
                'first_name' => $testname2,
                'last_name' => 'Doe',
                'email' => $testname2 . '.doe@test.be',
                //'cover_image' => $faker->image('public/images', 200, 200, 'cats', false),
                'address_street' => 'TestStreet',
                'address_number' => $addressnumber,
                'address_postcode' => $adresspostcode,
                'address_location' => 'TestCity',
                'address_country' => 'TestCountry',
                'password' => bcrypt('654321'),
                'created_at' => $created_at,
            ];
        }

        DB::table(self::TABLE)->insert($testuser);

    }
}
