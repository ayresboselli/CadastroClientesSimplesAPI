<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use App\Models\User;

class AutenticacaoTest extends TestCase
{
    /**
     * Testa a autenticação
     */
    public function test_login(): void
    {
        $param = [
            "email" => "admin@server.com",
            "senha" => "13245678"
        ];

        $response = $this->postJson('/api/login', $param);

        $response->assertStatus(200)
            ->assertJsonStructure([
                "token"
            ]);
    }

    
    /**
     * Testa o login com dados inválidos.
     */
    public function test_login_errado()
    {
        $param = [
            "email" => "login.errado@server.com",
            "password" => "1234"
        ];

        $response = $this->postJson('/api/login', $param);

        $response->assertStatus(401);
    }
}
