<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Cliente;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@server.com',
            'admin' => true,
            'password' => Hash::make('13245678')
        ]);

        User::factory()->create([
            'name' => 'Supervisor',
            'email' => 'superisor@server.com',
            'admin' => false,
            'password' => Hash::make('123456')
        ]);

        
        
        Grupo::factory()->create([
            'nome' => 'Classe A'
        ]);

        Grupo::factory()->create([
            'nome' => 'Classe B'
        ]);

        Grupo::factory()->create([
            'nome' => 'Classe C'
        ]);

        
        // Classe A
        Cliente::factory()->create([
            'grupo_id' => 1,
            'nome' => 'Vicente',
            'sobrenome' => 'Rocha',
            'cpf' => '885.043.690-48',
            'data_nascimento' => '2001-01-23'
        ]);
        Cliente::factory()->create([
            'grupo_id' => 1,
            'nome' => 'Cecília',
            'sobrenome' => 'Queirós',
            'cpf' => '587.030.950-61',
            'data_nascimento' => '2006-08-15'
        ]);

        // Classe B
        Cliente::factory()->create([
            'grupo_id' => 2,
            'nome' => 'Francisco',
            'sobrenome' => 'Matos',
            'cpf' => '736.716.990-43',
            'data_nascimento' => '2006-10-05'
        ]);
        Cliente::factory()->create([
            'grupo_id' => 2,
            'nome' => 'Helena',
            'sobrenome' => 'Magalhães',
            'cpf' => '982.825.040-33',
            'data_nascimento' => '2004-05-03'
        ]);
        
        // Classe C
        Cliente::factory()->create([
            'grupo_id' => 3,
            'nome' => 'Caetano',
            'sobrenome' => 'Correia',
            'cpf' => '950.752.630-70',
            'data_nascimento' => '2002-02-08'
        ]);
        Cliente::factory()->create([
            'grupo_id' => 3,
            'nome' => 'Antônia',
            'sobrenome' => 'Azevedo',
            'cpf' => '148.292.100-60',
            'data_nascimento' => '1995-06-28'
        ]);
        Cliente::factory()->create([
            'grupo_id' => 3,
            'nome' => 'Benjamin',
            'sobrenome' => 'Almeida',
            'cpf' => '824.800.970-05',
            'data_nascimento' => '1985-12-03'
        ]);

    }
}
