<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            "book_title" => "Botje",
            "author" => "Janneke Schotveld",
            "genre" =>  "Actie en Avontuur",
            "age" => "vanaf 8 jaar",
            "difficulty" => "AVI M6",
            "book_image" => "/img/botje.png",
            "ISBN" => "9789000339280",
        ]);
    }
}
