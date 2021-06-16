<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserAssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_assignments')->insert([
            "user_email" => "TimBakker123@gmail.com",
            "book_isbn" => "9789000339280",
            'assignment_position' => "1",
            "assignment" => 'Hieronder kun jij een kleur kiezen. Zoek de mooiste kleur uit en geef hem net zo’n bijzondere naam. Bedenk daarvoor dus goed waar de kleur jou precies aan doet denken.',
            'kind_of_assignment' => 'color',
            'status' => 'inactive',
        ]);

        DB::table('user_assignments')->insert([
            "user_email" => "TimBakker123@gmail.com",
            "book_isbn" => "9789000339280",
            'assignment_position' => "2",
            "assignment" => 'Maak een ontwerp van jouw eigen muts! Teken hem op het juiste formaat uit, knip hem uit en bekijk zelf voor de spiegel hoe hij staat of knutsel hem zodat hij echt op jouw hoofd past. Upload als je klaar bent een foto voor in je boekenkast.',
            'kind_of_assignment' => 'image',
            'status' => 'active',
        ]);



        
    }
}
