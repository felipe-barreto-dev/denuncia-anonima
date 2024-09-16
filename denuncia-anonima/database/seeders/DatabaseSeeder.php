<?php

namespace Database\Seeders;

use App\Models\Usuario; 
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Usuario::create([
            'login' => 'usuario@teste',
            'password' => 'senha@teste',
            'id_perfil' => 1, 
        ]);
    }
}
