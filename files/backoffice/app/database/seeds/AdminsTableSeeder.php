<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const TABLE = 'admins';
    public function run()
    {
        /* Test Admins */
        $superadmin = [];
        $superadmin[] = [
            'user_name' => 'TestSuperAdmin',
            'first_name' => 'Test',
            'last_name' => 'SuperAdmin',
            'email' => 'test.superadmin@test.be',
            'password' => bcrypt('123456'),
            'role' => 'Super-Admin',
            'created_at' => new DateTime(),
        ];

        $admin = [];
        $admin[] = [
            'user_name' => 'TestAdmin',
            'first_name' => 'Test',
            'last_name' => 'Admin',
            'email' => 'test.admin@test.be',
            'password' => bcrypt('123456'),
            'role' => 'Admin',
            'created_at' => new DateTime(),
        ];

        DB::table(self::TABLE)->insert($superadmin);
        DB::table(self::TABLE)->insert($admin);
    }
}
