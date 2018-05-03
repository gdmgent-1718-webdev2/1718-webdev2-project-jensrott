<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const TABLE = 'categories';
    public function run(Faker $faker)
    {
        $categories = [];

        $categories[] = [
            'name' => 'Fietsen',
            'description' => 'Fietsen van oud wielrenners',
            'picture' => 'picture',
            'created_at' => $faker->dateTimeBetween('2018-02-01', '2018-04-31'),
        ];

        $categories[] = [
            'name' => "Foto's oud renners",
            'description' => "Foto's van oud renners",
            'picture' => 'picture',
            'created_at' => $faker->dateTimeBetween('2018-02-01', '2018-04-31'),
        ];

        $categories[] = [
            'name' => 'Wielerschoenen',
            'description' => 'Schoenen voor wielrenners',
            'picture' => 'picture',
            'created_at' => $faker->dateTimeBetween('2018-02-01', '2018-04-31'),
        ];

        $categories[] = [
            'name' => 'Wielertruitjes',
            'description' => 'Truitjes voor wielrenners',
            'picture' => 'picture',
            'created_at' => $faker->dateTimeBetween('2018-02-01', '2018-04-31'),
        ];

        $categories[] = [
            'name' => 'Sokken',
            'description' => 'Sokken voor wielrenners',
            'picture' => 'picture',
            'created_at' => $faker->dateTimeBetween('2018-02-01', '2018-04-31'),
        ];

        $categories[] = [
            'name' => 'Koerspetjes',
            'description' => 'Koerspetjes voor wielrenners',
            'picture' => 'picture',
            'created_at' => $faker->dateTimeBetween('2018-02-01', '2018-04-31'),
        ];

        $categories[] = [
            'name' => 'Handschoenen',
            'description' => 'Handschoenen voor wielrenners',
            'picture' => 'picture',
            'created_at' => $faker->dateTimeBetween('2018-02-01', '2018-04-31'),
        ];

        $categories[] = [
            'name' => 'Bidons',
            'description' => 'Bidons voor wielrenners',
            'picture' => 'picture',
            'created_at' => $faker->dateTimeBetween('2018-02-01', '2018-04-31'),
        ];

        DB::table(self::TABLE)->insert($categories);
    }
}
