<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ninja;
use App\Models\Dojo;

class NinjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ninjas = [
            [
                'name' => 'Kazuki Tanaka',
                'bio' => 'Maître ninja du Dojo de la Montagne Céleste, Kazuki est réputé pour sa maîtrise des techniques de combat traditionnelles. Il a passé 20 ans à perfectionner son art et est considéré comme l\'un des plus grands experts en arts martiaux de sa génération. Sa technique de combat préférée est le "Coup de Vent Silencieux", une attaque si rapide qu\'elle est invisible à l\'œil nu.',
                'skill' => 95,
                'dojo_id' => 1
            ],
            [
                'name' => 'Yuki Nakamura',
                'bio' => 'Spécialiste de l\'infiltration et du camouflage, Yuki a été formée à l\'Académie des Ombres Silencieuses. Elle est capable de se fondre dans n\'importe quel environnement et de se déplacer sans faire le moindre bruit. Ses missions d\'espionnage ont permis de déjouer de nombreux complots contre l\'empire.',
                'skill' => 88,
                'dojo_id' => 2
            ],
            [
                'name' => 'Hiroshi Yamamoto',
                'bio' => 'Expert en survie en conditions extrêmes, Hiroshi a été formé au Temple du Vent du Nord. Il peut survivre pendant des semaines dans les montagnes enneigées avec seulement un couteau et ses compétences. Sa connaissance des éléments naturels lui permet d\'utiliser le vent, la neige et la glace comme armes.',
                'skill' => 92,
                'dojo_id' => 3
            ],
            [
                'name' => 'Akira Sato',
                'bio' => 'Maître du maniement des armes traditionnelles, Akira a été formé au Dojo de la Lame Cachée. Il peut lancer un shuriken avec une précision mortelle à plus de 50 mètres et maîtrise parfaitement le katana. Sa technique "Danse des Lames" est redoutée par tous ses ennemis.',
                'skill' => 90,
                'dojo_id' => 4
            ],
            [
                'name' => 'Maya Ito',
                'bio' => 'Ninja moderne spécialisée dans la cybernétique, Maya a été formée à l\'Académie des Esprits de la Nuit. Elle combine les techniques traditionnelles avec les technologies les plus avancées. Elle peut infiltrer n\'importe quel système informatique et utiliser la technologie comme une extension de son corps.',
                'skill' => 85,
                'dojo_id' => 5
            ],
            [
                'name' => 'Kenji Suzuki',
                'bio' => 'Maître de la méditation et de la paix intérieure, Kenji a été formé au Monastère de la Paix Intérieure. Il peut entrer dans un état de transe qui lui permet de percevoir les intentions de ses ennemis avant même qu\'ils n\'agissent. Sa technique "Esprit du Tigre" lui donne une force surhumaine.',
                'skill' => 87,
                'dojo_id' => 6
            ],
            [
                'name' => 'Riko Matsumoto',
                'bio' => 'Spécialiste de la vitesse et de l\'agilité, Riko a été formée au Dojo de la Foudre Rapide. Elle peut se déplacer si rapidement qu\'elle laisse des images résiduelles derrière elle. Sa technique "Pas du Vent" lui permet de traverser une pièce sans être vue.',
                'skill' => 89,
                'dojo_id' => 7
            ],
            [
                'name' => 'Takeshi Watanabe',
                'bio' => 'Expert en combat aquatique, Takeshi a été formé à l\'Académie des Maîtres de l\'Eau. Il peut rester sous l\'eau pendant plus de 10 minutes et se déplacer dans les courants marins avec une agilité de poisson. Ses missions maritimes ont sauvé de nombreux navires de la piraterie.',
                'skill' => 86,
                'dojo_id' => 8
            ],
            [
                'name' => 'Sakura Kimura',
                'bio' => 'Jeune prodige du Dojo de la Montagne Céleste, Sakura a un talent naturel pour les arts martiaux. Malgré son jeune âge, elle maîtrise déjà des techniques que des ninjas expérimentés mettent des années à apprendre. Son potentiel est considéré comme illimité.',
                'skill' => 78,
                'dojo_id' => 1
            ],
            [
                'name' => 'Daichi Kobayashi',
                'bio' => 'Ninja vétéran de l\'Académie des Ombres Silencieuses, Daichi a plus de 30 ans d\'expérience dans l\'art de l\'infiltration. Il a formé de nombreux jeunes ninjas et est respecté pour sa sagesse et son expérience. Sa technique "Ombre du Tigre" est légendaire.',
                'skill' => 94,
                'dojo_id' => 2
            ],
            [
                'name' => 'Natsuki Fujimoto',
                'bio' => 'Spécialiste des techniques de guérison et de médecine traditionnelle, Natsuki a été formée au Monastère de la Paix Intérieure. Elle peut soigner les blessures les plus graves avec des herbes et des techniques de méditation. Ses compétences médicales ont sauvé de nombreuses vies.',
                'skill' => 82,
                'dojo_id' => 6
            ],
            [
                'name' => 'Ryota Tanaka',
                'bio' => 'Expert en stratégie militaire, Ryota a été formé au Dojo de la Lame Cachée. Il peut analyser n\'importe quelle situation de combat et élaborer des stratégies complexes en quelques secondes. Ses plans tactiques ont permis de remporter de nombreuses batailles.',
                'skill' => 91,
                'dojo_id' => 4
            ]
        ];

        foreach ($ninjas as $ninja) {
            Ninja::create($ninja);
        }

        $this->command->info('Ninjas créés avec succès !');
    }
}
