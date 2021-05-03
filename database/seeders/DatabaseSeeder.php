<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // admin
        $this->call([
            // seeding role and admin
            RoleTableSeeder::class,
            AdminTableSeeder::class,
            // seeding category and item
            CategorySeeder::class,
            ItemSeeder::class,
            //user table seeder
            UserTableSeeder::class
        ]);

        User::factory(100)->create();
    }
}
