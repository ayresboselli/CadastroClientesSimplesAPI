<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Repositories\GrupoRepository;
use App\Models\Grupo;

class GrupoRepositoryTest extends TestCase
{
    /**
     * Cria um novo grupo
     */
    public function test_salvar(): void
    {
        $result = GrupoRepository::Save(['nome' => 'Grupo Teste']);
        $this->assertTrue(gettype($result->id) == 'integer');
    }

    /**
     * Edita um grupo
     */
    public function test_editar(): void
    {
        $grp = Grupo::first();

        $result = GrupoRepository::Save([
            'id' => $grp->id,
            'nome' => 'Teste alterado'
        ]);

        $this->assertTrue($result->nome == 'Teste alterado');
    }

    /**
     * Busca um grupo
     */
    public function test_buscar(): void
    {
        $grp = Grupo::first();

        $result = GrupoRepository::FindOne($grp->id);

        $this->assertTrue($result->id == $grp->id);
    }

    /**
     * Lista os grupos
     */
    public function test_listar(): void
    {
        $result = GrupoRepository::FindAll();

        $this->assertTrue($result instanceof \Illuminate\Database\Eloquent\Collection);
    }
    
    /**
     * Deleta um grupo
     */
    public function test_deletar(): void
    {
        $grp = Grupo::orderBy('id','desc')->first();

        $result = GrupoRepository::Delete($grp->id);

        $this->assertTrue($result);
    }
}
