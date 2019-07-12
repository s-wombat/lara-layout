<?php

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
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
//         factory(App\User::class, 10)->create();
         factory(App\Product::class, 50)->create();
//         factory(App\Category::class, 20)->create();

    }
}
