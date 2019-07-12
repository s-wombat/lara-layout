<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        for ($i = 1; $i <= 20; $i++){
            $name = 'User ' . $i;
            $email = str_random(10).'@i.ua';
            $phone = '+380' . random_int(600000000, 900000000);
                $users[] = [
                    'role_id' => random_int(1, 2),
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => bcrypt('123456'), // secret
                    'remember_token' => str_random(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
        }
        \DB::table('users')->insert($users);
    }
}
