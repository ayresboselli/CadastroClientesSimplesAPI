<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use App\Repositories\ClienteRepository;
use App\Models\Cliente;

class ClienteRepositoryTest extends TestCase
{
    /**
     * Criar um novo cliente
     */
    public function test_salvar(): void
    {
        $result = ClienteRepository::Save([
            'grupo_id' => 1,
            'nome' => 'Teste',
            'sobrenome' => 'Unitário',
            'cpf' => '278.850.850-66',
            'data_nascimento' => '1996-08-28',
            'email' => 'email@teste.net',
            'telefone' => '(99) 99999-9999',
        ]);

        $this->assertTrue(gettype($result->id) == 'integer');
    }
    
    /**
     * Edita um cliente
     */
    public function test_editar(): void
    {
        $cli = Cliente::first();

        $result = ClienteRepository::Save([
            'id' => $cli->id,
            'grupo_id' => $cli->grupo_id,
            'nome' => 'Teste alterado',
            'sobrenome' => $cli->sobrenome,
            'cpf' => $cli->cpf,
            'data_nascimento' => $cli->data_nascimento,
            'email' => $cli->email,
            'telefone' => $cli->telefone,
        ]);

        $this->assertTrue($result->nome == 'Teste alterado');
    }

    /**
     * Busca um cliente
     */
    public function test_buscar(): void
    {
        $cli = Cliente::first();

        $result = ClienteRepository::FindOne($cli->id);

        $this->assertTrue($result->id == $cli->id);
    }

    /**
     * Lista os cliente
     */
    public function test_listar(): void
    {
        $result = ClienteRepository::FindAll();

        $this->assertTrue($result instanceof \Illuminate\Database\Eloquent\Collection);
    }
    
    /**
     * Deleta um cliente
     */
    public function test_deletar(): void
    {
        $cli = Cliente::orderBy('id','desc')->first();

        $result = ClienteRepository::Delete($cli->id);

        $this->assertTrue($result);
    }
}
