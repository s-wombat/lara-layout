<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        for ($i = 1; $i <= 20; $i++){
            $name = 'Category # ' . $i;
            $up_cat = random_int(0, 6);
            $categories[] = [
                'name' => $name,
                'description' => str_random(10),
                'up_cat' => $up_cat,
                'publish' => random_int(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        \DB::table('categories')->insert($categories);
    }
}
