<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Helpers\CpfCnpj;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grupo_id' => fake(),
            'nome' => fake()->name(),
            'sobrenome' => fake()->name(),
            'cpf' => CpfCnpj::CpfRandom(),
            'data_nascimento' => date("Y-m-d",rand(1262055681,1262055681))
        ];
    }
}
