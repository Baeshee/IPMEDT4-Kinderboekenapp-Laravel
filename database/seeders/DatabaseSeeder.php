<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BooksTableSeeder::class,
            UsersTableSeeder::class,
            AssignmentsTableSeeder::class,
            // UsersBooksSeeder::class,
        ]);
    }
}
