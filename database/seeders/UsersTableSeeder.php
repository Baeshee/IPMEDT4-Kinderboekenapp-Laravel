<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Tim',
            'email' => 'timbakker123@gmail.com',
            'password' => bcrypt('lezeniskoel123'),
            'mascotte_img' => '/img/red.png',
        ]);

        DB::table('users')->insert([
            'name' => 'Peter',
            'email' => 'peterbakker123@gmail.com',
            'password' => bcrypt('lezeniskoel123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Juf Ans',
            'email' => 'jufans@gmail.com',
            'password' => bcrypt('ikbendeleukstejuf'),
            'role' => 'Admin',
        ]);

    }
}
