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

        DB::table('books')->insert([
            "book_title" => "Pluk van de Petteflet",
            "author" => "Annie M.G. Schmidt",
            "genre" =>  "Fictie",
            "age" => "vanaf 5 jaar",
            "difficulty" => "AVI M5",
            "book_image" => "/img/pluk.png",
            "ISBN" => "9789045110950",
        ]);

        DB::table('books')->insert([
            "book_title" => "Fantasia I",
            "author" => "Geronimo Stilton",
            "genre" =>  "Spanning en Avontuur",
            "age" => "vanaf 8 jaar",
            "difficulty" => "AVI E5, M6, E6",
            "book_image" => "/img/fantasia_1.png",
            "ISBN" => "9789058930088",
        ]);

        DB::table('books')->insert([
            "book_title" => "Fantasia II",
            "author" => "Geronimo Stilton",
            "genre" =>  "Spanning en Avontuur",
            "age" => "vanaf 8 jaar",
            "difficulty" => "AVI E5, M6, E6",
            "book_image" => "/img/fantasia_2.png",
            "ISBN" => "9789085920168",
        ]);

        DB::table('books')->insert([
            "book_title" => "Fantasia III",
            "author" => "Geronimo Stilton",
            "genre" =>  "Spanning en Avontuur",
            "age" => "vanaf 8 jaar",
            "difficulty" => "AVI E5, M6, E6",
            "book_image" => "/img/fantasia_3.png",
            "ISBN" => "9789085920496",
        ]);

        DB::table('books')->insert([
            "book_title" => "Fantasia IV",
            "author" => "Geronimo Stilton",
            "genre" =>  "Spanning en Avontuur",
            "age" => "vanaf 8 jaar",
            "difficulty" => "AVI E5, M6, E6",
            "book_image" => "/img/fantasia_4.png",
            "ISBN" => "9789085920717",
        ]);

        DB::table('books')->insert([
            "book_title" => "Dolfje Weerwolfje - Niet bijten, Dolfje!",
            "author" => "Paul van Loon",
            "genre" =>  "Avontuur",
            "age" => "vanaf 6 jaar",
            "difficulty" => "AVI E4",
            "book_image" => "/img/dolfje_nietBijten.png",
            "ISBN" => "9789025860097",
        ]);

        DB::table('books')->insert([
            "book_title" => "Dolfje Weerwolfje - Dolfje en Noura",
            "author" => "Paul van Loon",
            "genre" =>  "Avontuur en Griezelen",
            "age" => "vanaf 6 jaar",
            "difficulty" => "AVI E4",
            "book_image" => "/img/dolfje_dolfjeNoura.png",
            "ISBN" => "9789025875312",
        ]);

        DB::table('books')->insert([
            "book_title" => "Dolfje Weerwolfje - MeerMonster",
            "author" => "Paul van Loon",
            "genre" =>  "Spanning en Humor",
            "age" => "vanaf 6 jaar",
            "difficulty" => "AVI E5",
            "book_image" => "/img/dolfje_meerMonster.png",
            "ISBN" => "9789025866020",
        ]);
    }
}
