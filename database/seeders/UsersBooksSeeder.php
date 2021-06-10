<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_books')->insert([
            'user_email' => 'TimBakker123@gmail.com',
            'book_isbn' => '9789000339280',
        ]);
        DB::table('users_books')->insert([
            'user_email' => 'TimBakker123@gmail.com',
            'book_isbn' => '9789045110950',
        ]);
        DB::table('users_books')->insert([
            'user_email' => 'TimBakker123@gmail.com',
            'book_isbn' => '9789058930088',
        ]);
        DB::table('users_books')->insert([
            'user_email' => 'TimBakker123@gmail.com',
            'book_isbn' => '9789025860097',
        ]);
        DB::table('users_books')->insert([
            'user_email' => 'TimBakker123@gmail.com',
            'book_isbn' => '9789085920717',
        ]);
    }
}
