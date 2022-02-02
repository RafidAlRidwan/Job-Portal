<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '',
            'password' => bcrypt(123456),
            'user_type' => 'admin',
            ]);

        User::create(
            [
            'name' => 'User',
            'email' => 'user@gmail.com',
            'phone' => '01700000000',
            'password' => bcrypt(123456),
            'user_type' => 'user',
            ]);
    }

}
