<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\User;
use App\Models\Ninja;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $ninjas = Ninja::all();
        
        // Ajouter quelques likes aléatoirement
        foreach ($users as $user) {
            $randomNinjas = $ninjas->random(rand(1, 3));
            
            foreach ($randomNinjas as $ninja) {
                Like::firstOrCreate([
                    'user_id' => $user->id,
                    'ninja_id' => $ninja->id,
                ]);
            }
        }
    }
}