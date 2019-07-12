<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [];
        for ($i = 1; $i <= 2; $i++){
            $name = 'User ' . $i;
            $role[] = [
                'name' => $name,
            ];
        }
        \DB::table('roles')->insert($role);
    }
}
