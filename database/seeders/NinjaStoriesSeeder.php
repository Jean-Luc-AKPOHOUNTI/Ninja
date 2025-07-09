<?php

namespace Database\Seeders;

use App\Models\Ninja;
use Illuminate\Database\Seeder;

class NinjaStoriesSeeder extends Seeder
{
    public function run(): void
    {
        $stories = [
            "Né dans les montagnes brumeuses du nord, ce ninja a appris l'art du silence en observant les loups. Sa première mission l'a mené dans les palais impériaux où il a déjoué un complot contre l'empereur. Maître de l'invisibilité, il peut disparaître dans l'ombre d'une bougie. On raconte qu'il a sauvé un village entier des bandits en une seule nuit, sans verser une goutte de sang.",

            "Orpheline dès son plus jeune âge, elle fut recueillie par un maître légendaire qui lui enseigna les techniques interdites. Son katana, forgé dans les flammes d'un dragon, ne connaît pas la défaite. Elle a traversé les Sept Royaumes pour venger sa famille, laissant derrière elle une traînée de justice. Ses ennemis la surnomment 'La Lame Fantôme' car elle frappe avant même qu'on la voie.",

            "Ancien moine guerrier, il a abandonné la voie pacifique après avoir vu son temple détruit. Ses poings peuvent briser la pierre et son esprit peut lire les intentions. Il parcourt maintenant les terres en quête de rédemption, protégeant les innocents. Sa méditation lui permet de prévoir les attaques de ses adversaires trois secondes à l'avance.",

            "Fille d'un seigneur déchu, elle a choisi la voie de l'ombre plutôt que l'exil. Experte en poisons et en déguisements, elle infiltre les cours royales pour rétablir l'honneur de sa famille. Ses shuriken empoisonnés n'ont jamais manqué leur cible. Elle danse avec la mort depuis l'âge de douze ans.",

            "Rescapé d'un massacre, il fut élevé par les corbeaux dans la forêt maudite. Ses techniques de combat imitent les mouvements des animaux sauvages. Il peut communiquer avec les esprits de la nature et invoquer les tempêtes. Son masque de corbeau cache des cicatrices qui racontent mille batailles.",

            "Maître espion au service de trois royaumes différents, sa loyauté n'appartient qu'à l'or. Ses talents de manipulation rivalisent avec ses compétences martiales. Il a orchestré la chute de dynasties entières depuis l'ombre. Personne ne connaît son vrai visage, car il change d'identité comme de kimono.",

            "Gardienne d'un temple secret, elle protège des artefacts millénaires. Ses techniques de combat fusionnent magie et arts martiaux. Elle peut marcher sur l'eau et respirer sous terre. Les démons eux-mêmes fuient devant sa présence purificatrice.",

            "Né sous une éclipse de lune, il fut marqué par les ténèbres dès sa naissance. Ses ombres prennent vie et combattent à ses côtés. Il chasse les créatures surnaturelles qui menacent le monde des vivants. Sa lame absorbe l'âme de ses ennemis pour devenir plus puissante.",

            "Ancienne courtisane devenue assassin, elle utilise sa beauté comme une arme mortelle. Ses éventails cachent des lames empoisonnées et ses danses hypnotisent ses victimes. Elle a éliminé plus de généraux que toute une armée. Son parfum de jasmin annonce la mort.",

            "Dernier survivant de son clan, il porte le poids de mille ans de tradition. Ses techniques secrètes se transmettent par le sang et la douleur. Il peut invoquer les esprits de ses ancêtres pour l'aider au combat. Sa quête de vengeance l'a mené aux portes de l'enfer et retour."
        ];

        $ninjas = Ninja::whereNull('story')->get();
        
        foreach ($ninjas as $index => $ninja) {
            if (isset($stories[$index])) {
                $ninja->update(['story' => $stories[$index]]);
                echo "Histoire ajoutée pour {$ninja->name}\n";
            }
        }
    }
}