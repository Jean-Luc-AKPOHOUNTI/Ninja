<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin Principal',
                'email' => 'admin@ninja.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Maître Kenshin',
                'email' => 'kenshin@ninja.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Yuki Sensei',
                'email' => 'yuki@ninja.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Hiroshi Tanaka',
                'email' => 'hiroshi@ninja.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Sakura Yamamoto',
                'email' => 'sakura@ninja.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Kenji Sato',
                'email' => 'kenji@ninja.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Maya Nakamura',
                'email' => 'maya@ninja.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Takeshi Kimura',
                'email' => 'takeshi@ninja.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]
        ];

        foreach ($users as $userData) {
            // Vérifier si l'utilisateur existe déjà
            $existingUser = User::where('email', $userData['email'])->first();
            
            if (!$existingUser) {
                User::create($userData);
            }
        }

        $this->command->info('Utilisateurs de test créés avec succès !');
        $this->command->info('Comptes admin : admin@ninja.com (admin123), kenshin@ninja.com (password123), yuki@ninja.com (password123)');
        $this->command->info('Comptes utilisateur : hiroshi@ninja.com, sakura@ninja.com, kenji@ninja.com, maya@ninja.com, takeshi@ninja.com (tous avec password123)');
    }
}
