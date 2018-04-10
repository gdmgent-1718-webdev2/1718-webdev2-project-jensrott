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
    }
}
