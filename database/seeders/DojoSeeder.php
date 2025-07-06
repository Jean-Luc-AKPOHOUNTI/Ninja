<?php

namespace Database\Seeders;

use App\Models\Dojo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DojoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dojos = [
            [
                'name' => 'Dojo de la Montagne Céleste',
                'location' => 'Kyoto, Japon',
                'description' => 'Un dojo ancestral niché dans les montagnes de Kyoto, réputé pour ses techniques de combat traditionnelles et sa formation spirituelle. Les ninjas qui sortent de ce dojo sont connus pour leur maîtrise des arts martiaux et leur discipline exemplaire.'
            ],
            [
                'name' => 'Académie des Ombres Silencieuses',
                'location' => 'Tokyo, Japon',
                'description' => 'Une académie moderne située au cœur de Tokyo, spécialisée dans les techniques d\'infiltration et de camouflage. Les étudiants apprennent l\'art de se déplacer sans être détectés et de maîtriser les techniques de combat rapproché.'
            ],
            [
                'name' => 'Temple du Vent du Nord',
                'location' => 'Hokkaido, Japon',
                'description' => 'Un temple isolé dans les montagnes enneigées d\'Hokkaido. Les ninjas de ce dojo sont experts dans les techniques de survie en conditions extrêmes et dans l\'utilisation des éléments naturels pour leurs missions.'
            ],
            [
                'name' => 'Dojo de la Lame Cachée',
                'location' => 'Osaka, Japon',
                'description' => 'Un dojo spécialisé dans l\'art du maniement des armes traditionnelles. Les étudiants apprennent à maîtriser le katana, le shuriken, et d\'autres armes ninja avec une précision mortelle.'
            ],
            [
                'name' => 'Académie des Esprits de la Nuit',
                'location' => 'Yokohama, Japon',
                'description' => 'Une académie moderne qui combine les techniques traditionnelles avec les technologies actuelles. Les ninjas de ce dojo sont experts en cybernétique et en infiltration numérique.'
            ],
            [
                'name' => 'Monastère de la Paix Intérieure',
                'location' => 'Nara, Japon',
                'description' => 'Un monastère ancien où les ninjas apprennent l\'équilibre entre la force physique et la paix mentale. Les techniques enseignées ici mettent l\'accent sur la méditation et la maîtrise de soi.'
            ],
            [
                'name' => 'Dojo de la Foudre Rapide',
                'location' => 'Nagoya, Japon',
                'description' => 'Un dojo réputé pour ses techniques de vitesse et d\'agilité. Les ninjas de ce dojo sont capables de se déplacer si rapidement qu\'ils semblent être partout à la fois.'
            ],
            [
                'name' => 'Académie des Maîtres de l\'Eau',
                'location' => 'Kobe, Japon',
                'description' => 'Située près de la mer, cette académie enseigne les techniques de combat aquatique et de navigation. Les ninjas de ce dojo sont experts dans les missions maritimes et la survie en milieu aquatique.'
            ]
        ];

        foreach ($dojos as $dojo) {
            Dojo::create($dojo);
        }

        $this->command->info('Dojos créés avec succès !');
    }
}
