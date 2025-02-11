<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Personne;
use App\Models\Compte;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Personne::create([
            'nom' => 'Admin',
            'prenom' => 'User',
            'cin' => 'ADMIN123',
            'email' => 'admin@example.com',
            'telephone' => '0600000000',
        ]);
    
        Compte::create([
            'personne_id' => $admin->id,
            'login' => 'adminuser@gmail.com',
            'password' => Hash::make('Admin@123'),
            'role' => 'ADMIN_USER',
            'enabled' => 1,
            'locked' => 0,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
