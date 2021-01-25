<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        DB::table('users')->insert([
            'name'=> 'Arnetta Felicia',
            'email'=>'georgeclm7@gmail.com',
            'password'=> bcrypt('123456789'),
        ]);

        User::create([
            'name' =>'George Clement',
            'email' =>'cavidjaja@gmail.com',
            // simpler way than hashing using bcrypt
            'password' =>bcrypt('123456789'),

        ]);
        User::create([
            'name' =>'Epafroditus George',
            'email' =>'georgeclm6@gmail.com',
            // simpler way than hashing using bcrypt
            'password' =>bcrypt('123456789'),

        ]);

    }
}
