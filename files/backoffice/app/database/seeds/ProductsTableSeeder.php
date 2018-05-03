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
        $products = [];
        for($i = 1; $i <= 5; $i++) {
            $name = 'Fiets' . strval($i);
            $start_bid_period = $faker->dateTimeBetween('2018-02-01', '2018-04-31');
            $date = new DateTime();
            $user = $i;

            $products[] = [
                'name' => $name,
                'description' => $name.' uit 1956',
                'picture' => 'f',
                'start_of_bid_period' => $start_bid_period, // Nog aanpassen
                'end_of_bid_period' => $date->modify('+1 month'), // Nog aanpassen
                'user_id' => $user,
                'created_at' => $start_bid_period,
                'updated_at' => new DateTime(),
                'category_id' => 1,
            ];
        }

        for($i = 1; $i <= 5; $i++) {
            $name = 'Foto' . strval($i);
            $start_bid_period = $faker->dateTimeBetween('2018-02-01', '2018-04-31');
            $date = new DateTime();
            $user = $i;

            $products[] = [
                'name' => $name,
                'description' => $name.' uit 1956',
                'picture' => 'f',
                'start_of_bid_period' => $start_bid_period, // Nog aanpassen
                'end_of_bid_period' => $date->modify('+1 month'), // Nog aanpassen
                'user_id' => $user,
                'created_at' => $start_bid_period,
                'updated_at' => new DateTime(),
                'category_id' => 2,
            ];
        }

        for($i = 1; $i <= 5; $i++) {
            $name = 'Schoen' . strval($i);
            $start_bid_period = $faker->dateTimeBetween('2018-02-01', '2018-04-31');
            $date = new DateTime();
            $user = $i;

            $products[] = [
                'name' => $name,
                'description' => $name.' gedragen door Eddy Merckx in Parijs-Roubaix',
                'picture' => 'f',
                'start_of_bid_period' => $start_bid_period, // Nog aanpassen
                'end_of_bid_period' => $date->modify('+1 month'), // Nog aanpassen
                'user_id' => $user,
                'created_at' => $start_bid_period,
                'updated_at' => new DateTime(),
                'category_id' => 1,
            ];
        }

        for($i = 1; $i <= 5; $i++) {
            $name = 'Trui' . strval($i);
            $start_bid_period = $faker->dateTimeBetween('2018-02-01', '2018-04-31');
            $date = new DateTime();
            $user = $i;

            $products[] = [
                'name' => $name,
                'description' => $name.' van Roger De Vlaeminck',
                'picture' => 'f',
                'start_of_bid_period' => $start_bid_period, // Nog aanpassen
                'end_of_bid_period' => $date->modify('+1 month'), // Nog aanpassen
                'user_id' => $user,
                'created_at' => $start_bid_period,
                'updated_at' => new DateTime(),
                'category_id' => 1,
            ];
        }

        for($i = 1; $i <= 5; $i++) {
            $name = 'Sok' . strval($i);
            $start_bid_period = $faker->dateTimeBetween('2018-02-01', '2018-04-31');
            $date = new DateTime();
            $user = $i;

            $products[] = [
                'name' => $name,
                'description' => $name.' uit 1980',
                'picture' => 'f',
                'start_of_bid_period' => $start_bid_period, // Nog aanpassen
                'end_of_bid_period' => $date->modify('+1 month'), // Nog aanpassen
                'user_id' => $user,
                'created_at' => $start_bid_period,
                'updated_at' => new DateTime(),
                'category_id' => 1,
            ];
        }

        for($i = 1; $i <= 5; $i++) {
            $name = 'Pet' . strval($i);
            $start_bid_period = $faker->dateTimeBetween('2018-02-01', '2018-04-31');
            $date = new DateTime();
            $user = $i;

            $products[] = [
                'name' => $name,
                'description' => $name.' Van Bartoli',
                'picture' => 'f',
                'start_of_bid_period' => $start_bid_period, // Nog aanpassen
                'end_of_bid_period' => $date->modify('+1 month'), // Nog aanpassen
                'user_id' => $user,
                'created_at' => $start_bid_period,
                'updated_at' => new DateTime(),
                'category_id' => 1,
            ];
        }

        for($i = 1; $i <= 5; $i++) {
            $name = 'Handschoen' . strval($i);
            $start_bid_period = $faker->dateTimeBetween('2018-02-01', '2018-04-31');
            $date = new DateTime();
            $user = $i;

            $products[] = [
                'name' => $name,
                'description' => $name.' Gedragen door Jan Raas',
                'picture' => 'f',
                'start_of_bid_period' => $start_bid_period, // Nog aanpassen
                'end_of_bid_period' => $date->modify('+1 month'), // Nog aanpassen
                'user_id' => $user,
                'created_at' => $start_bid_period,
                'updated_at' => new DateTime(),
                'category_id' => 1,
            ];
        }

        for($i = 1; $i <= 5; $i++) {
            $name = 'Bidon' . strval($i);
            $start_bid_period = $faker->dateTimeBetween('2018-02-01', '2018-04-31');
            $date = new DateTime();
            $user = $i;

            $products[] = [
                'name' => $name,
                'description' => $name.' waar Freddy Maertens nog uit dronk',
                'picture' => 'f',
                'start_of_bid_period' => $start_bid_period, // Nog aanpassen
                'end_of_bid_period' => $date->modify('+1 month'), // Nog aanpassen
                'user_id' => $user,
                'created_at' => $start_bid_period,
                'updated_at' => new DateTime(),
                'category_id' => 1,
            ];
        }


        DB::table(self::TABLE)->insert($products);
    }
}
