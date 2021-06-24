<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AssignmentTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //book assignment for Botje
        DB::table('assignment_template')->insert([
            "book_isbn" => "9789000339280",
            "assignment" => 'Bibi haar vader heeft een wolwinkel en verkoopt daar de meest bijzondere kleuren wol. Zo lezen we over paardenbloemstengelgroen, varkensstaartjesroze, diepzeezwart, watermeloenrood, krijtrotswit en Middellandsezeeblauw. In de naam van de kleur zie je steeds al staan waar je de kleur ‘in het echt’ terug kunt zien. Kun jij ook zo’n mooie naam bedenken voor een kleur? Hieronder kun jij een kleur kiezen. Zoek de mooiste kleur uit en geef hem net zo’n bijzondere naam. Bedenk daarvoor dus goed waar de kleur jou precies aan doet denken..',
            'kind_of_assignment' => 'color',
            'chapters' => 'Hoofdstuk 1 t/m 4',
        ]);

        DB::table('assignment_template')->insert([
            "book_isbn" => "9789000339280",
            "assignment" => 'Maak een ontwerp van jouw eigen muts! Teken hem op het juiste formaat uit, knip hem uit en bekijk zelf voor de spiegel hoe hij staat of knutsel hem zodat hij echt op jouw hoofd past. Upload als je klaar bent een foto voor in je boekenkast.',
            'kind_of_assignment' => 'image',
            'chapters' => 'Hoofdstuk 5 t/m 9',
        ]);

        DB::table('assignment_template')->insert([
            "book_isbn" => "9789000339280",
            "assignment" => 'Luister hieronder naar een audiofragment over je boek.',
            'kind_of_assignment' => 'audio',
            'chapters' => 'Hoofdstuk 10 t/m 14',
        ]);

        DB::table('assignment_template')->insert([
            "book_isbn" => "9789000339280",
            "assignment" => 'Luister hieronder naar een Podcast over je boek.',
            'kind_of_assignment' => 'podcast',
            'chapters' => 'Hoofdstuk 15 t/m 19',
        ]);

        //book assignment for Pluk van de Petteflet
        DB::table('assignment_template')->insert([
            "book_isbn" => "9789045110950",
            "assignment" => 'Maak een ontwerp van jouw eigen kraanwagentje! Teken hem zoals je zelf wil. Kies een leuke kleur voor je wagentje. Bijvoorbeeld je lievelingskleur. Upload als je klaar bent een foto voor in je boekenkast.',
            'kind_of_assignment' => 'image',
            'chapters' => 'Hoofdstuk 1 t/m 3',
        ]);

        DB::table('assignment_template')->insert([
            "book_isbn" => "9789045110950",
            "assignment" => 'Noem 1 kriebelbeestje wat voor komt in jouw tuin.',
            'kind_of_assignment' => 'color',
            'chapters' => 'Hoofdstuk 4 t/m 6',
        ]);
    }
}
