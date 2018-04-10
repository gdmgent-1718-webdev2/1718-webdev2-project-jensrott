<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const TABLE = 'categories';
    public function run()
    {
        DB::table(self::TABLE)->insert([
            'name' => "Foto's oud renners",
            'description' => "Foto's van oud renners",
            'picture' => 'picture',
            'created_at' => new DateTime(),
        ]);

        DB::table(self::TABLE)->insert([
            'name' => 'Wielerschoenen',
            'description' => 'Schoenen voor wielrenners',
            'picture' => 'picture',
            'created_at' => new DateTime(),
        ]);

        DB::table(self::TABLE)->insert([
            'name' => 'Wielertruitjes',
            'description' => 'Truitjes voor wielrenners',
            'picture' => 'picture',
            'created_at' => new DateTime(),
        ]);

        DB::table(self::TABLE)->insert([
            'name' => 'Sokken',
            'description' => 'Sokken voor wielrenners',
            'picture' => 'picture',
            'created_at' => new DateTime(),
        ]);

        DB::table(self::TABLE)->insert([
            'name' => 'Koerspetjes',
            'description' => 'Koerspetjes voor wielrenners',
            'picture' => 'picture',
            'created_at' => new DateTime(),
        ]);

        DB::table(self::TABLE)->insert([
            'name' => 'Handschoenen',
            'description' => 'Handschoenen voor wielrenners',
            'picture' => 'picture',
            'created_at' => new DateTime(),
        ]);

        DB::table(self::TABLE)->insert([
            'name' => 'Bidons',
            'description' => 'Bidons voor wielrenners',
            'picture' => 'picture',
            'created_at' => new DateTime(),
        ]);
    }
}
