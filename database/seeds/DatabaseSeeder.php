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
//         $this->call(UsersTableSeeder::class);
         factory(App\User::class, 80)->create();
         factory(App\Product::class, 100)->create();
//         factory(App\Category::class, 20)->create();
    }
}
