<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('assignments')->insert([
        //     "user_email" => "TimBakker123@gmail.com",
        //     "book_isbn" => "9789000339280",
        //     "assignment" => 'Bibi haar vader heeft een wolwinkel en verkoopt daar de meest bijzondere kleuren wol. Zo lezen we over paardenbloemstengelgroen, varkensstaartjesroze, diepzeezwart, watermeloenrood, krijtrotswit en Middellandsezeeblauw. In de naam van de kleur zie je steeds al staan waar je de kleur ‘in het echt’ terug kunt zien. Kun jij ook zo’n mooie naam bedenken voor een kleur? Hieronder kun jij een kleur kiezen. Zoek de mooiste kleur uit en geef hem net zo’n bijzondere naam. Bedenk daarvoor dus goed waar de kleur jou precies aan doet denken..',
        //     'kind_of_assignment' => 'color',
        //     'status' => 'active',
        //     'chapters' => 'Hoofdstuk 1 t/m 3',
        //     'answer_1' => '',
        //     'answer_2' => '',
        //     'answer_3' => '',
        //     'answer_4' => '',
        // ]);

        // DB::table('assignments')->insert([
        //     "user_email" => "TimBakker123@gmail.com",
        //     "book_isbn" => "9789000339280",
        //     "assignment" => 'Maak een ontwerp van jouw eigen muts! Teken hem op het juiste formaat uit, knip hem uit en bekijk zelf voor de spiegel hoe hij staat of knutsel hem zodat hij echt op jouw hoofd past. Upload als je klaar bent een foto voor in je boekenkast.',
        //     'kind_of_assignment' => 'image',
        //     'status' => 'active',
        //     'chapters' => 'Hoofdstuk 4 t/m 6',
        //     'answer_1' => '',
        //     'answer_2' => '',
        //     'answer_3' => '',
        //     'answer_4' => '',
        // ]);
        // DB::table('assignments')->insert([
        //     "user_email" => "TimBakker123@gmail.com",
        //     "book_isbn" => "9789000339280",
        //     "assignment" => 'Luister hieronder naar een audiofragment over je boek.',
        //     'kind_of_assignment' => 'audio',
        //     'status' => 'active',
        //     'chapters' => 'Hoofdstuk 13 t/m 15',
        //     'answer_1' => '',
        //     'answer_2' => '',
        //     'answer_3' => '',
        //     'answer_4' => '',
        // ]);
        // DB::table('assignments')->insert([
        //     "user_email" => "TimBakker123@gmail.com",
        //     "book_isbn" => "9789000339280",
        //     "assignment" => 'Luister hieronder naar een Podcast over je boek.',
        //     'kind_of_assignment' => 'podcast',
        //     'status' => 'active',
        //     'chapters' => 'Hoofdstuk 16 t/m 18',
        //     'answer_1' => '',
        //     'answer_2' => '',
        //     'answer_3' => '',
        //     'answer_4' => '',
        // ]);
    }
}
