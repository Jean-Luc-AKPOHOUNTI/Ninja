<?php

namespace Database\Seeders;

use App\Models\Favorite;
use App\Models\User;
use App\Models\Ninja;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $ninjas = Ninja::all();
        
        foreach ($users as $user) {
            $randomNinjas = $ninjas->random(rand(1, 2));
            
            foreach ($randomNinjas as $ninja) {
                Favorite::firstOrCreate([
                    'user_id' => $user->id,
                    'ninja_id' => $ninja->id,
                ]);
            }
        }
    }
}