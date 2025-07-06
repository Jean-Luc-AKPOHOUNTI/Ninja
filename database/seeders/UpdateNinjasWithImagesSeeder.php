<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ninja;
use Illuminate\Support\Facades\Storage;

class UpdateNinjasWithImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer les images disponibles
        $images = [
            'ninjas/KJxap6NbIGzgI59QO29IK564ERlg8MIwm8iVxJR1.jpg',
            'ninjas/87kN8spwLPhNE3UQq6iItebA4NfIOZtILvCEKtrH.jpg'
        ];

        // Récupérer tous les ninjas
        $ninjas = Ninja::all();
        
        foreach ($ninjas as $index => $ninja) {
            // Assigner une image de manière cyclique
            $imagePath = $images[$index % count($images)];
            
            // Vérifier que l'image existe
            if (Storage::disk('public')->exists($imagePath)) {
                $ninja->update([
                    'image' => $imagePath,
                    'story' => $ninja->story ?? "L'histoire mystérieuse de {$ninja->name} reste encore à écrire..."
                ]);
            }
        }

        $this->command->info('Images assignées aux ninjas avec succès !');
    }
}
