<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const TABLE = 'products';

    public function run(Faker $faker)
    {
        /*
        for ($i = 0; $i <= 9; $i++) {
            DB::table(self::TABLE)->insert([
                'name' => $faker->name,
                'description' => $faker->text,
                'picture' => $faker->linuxProcessor,
                'start_of_bid_period' => $faker->dateTime,
                'end_of_bid_period' => $faker->dateTime,
                'user_id' => rand(1,10),
                'category_id' => rand(1,10),
            ]);
        }
        */
        $products = [];
        $products[] = [
            'name' => 'Fiets Bianchi',
            'description' => 'Bianchi Fiets uit 1956',
            'picture' => 'f',
            'start_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'end_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'user_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'category_id' => 4,
        ];

        $products[] = [
            'name' => 'Fiets Flanders',
            'description' => 'Flanders fiets uit 1980',
            'picture' => 'f',
            'start_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'end_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'user_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'category_id' => 7,
        ];

        $products[] = [
            'name' => 'Fiets Eddy Merckx',
            'description' => 'Eddy Merckx fiets uit 1972',
            'picture' => 'f',
            'start_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'end_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'user_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'category_id' => 3,
        ];

        $products[] = [
            'name' => 'Koerspetje Isorex',
            'description' => 'Koerspetje nog gedragen door Jens Rottiers',
            'picture' => 'f',
            'start_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'end_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'user_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'category_id' => 5,
        ];

        $products[] = [
            'name' => 'Koerspetje Flandria',
            'description' => 'Koerspetje nog gedragen door Freddy Maertens',
            'picture' => 'f',
            'start_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'end_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'user_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'category_id' => 7,
        ];

        $products[] = [
            'name' => 'Handschoenen Luc Rottiers',
            'description' => 'Handschoen nog gedragen door de wereldkampioen',
            'picture' => 'f',
            'start_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'end_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'user_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'category_id' => 6,
        ];

        $products[] = [
            'name' => 'Wielertruitje Jan Janssen',
            'description' => 'Truitje gedragen door Jan in de ronde',
            'picture' => 'f',
            'start_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'end_of_bid_period' => $faker->dateTime, // Nog aanpassen
            'user_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'category_id' => 3,
        ];

        DB::table(self::TABLE)->insert($products);
    }
}
