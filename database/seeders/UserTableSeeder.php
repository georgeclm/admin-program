<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>'George Clement',
            'email' =>'cavidjaja@gmail.com',
            // simpler way than hashing using bcrypt
            'password' =>bcrypt('123456789'),

        ]);
        User::create([
            'name' =>'Test name',
            'email' =>'test@test.com',
            // simpler way than hashing using bcrypt
            'password' =>bcrypt('123456789'),

        ]);

    }
}
