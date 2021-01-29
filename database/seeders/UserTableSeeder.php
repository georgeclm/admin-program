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
            'name'=> 'George',
            'email'=>'cavidjaja@gmail.com',
            'password'=> bcrypt('123456789'),
        ]);
        DB::table('users')->insert([
            'name'=> 'Arnetta',
            'email'=>'georgeclm6@gmail.com',
            'password'=> bcrypt('123456789'),
        ]);
        DB::table('packages')->insert([
            'name'=> 'Yearly Package',
            'amount'=>'1500000',
            'number_of_days'=> '365',
            'status' => 'active',
        ]);
        DB::table('packages')->insert([
            'name'=> 'Half Year Package',
            'amount'=>'850000',
            'number_of_days'=> 180,
            'status' => 'active',
        ]);
        DB::table('packages')->insert([
            'name'=> 'Montlhy Package',
            'amount'=>'200000',
            'number_of_days'=> '30',
            'status' => 'active',
        ]);
        

        



    }
}
