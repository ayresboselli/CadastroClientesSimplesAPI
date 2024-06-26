<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\GrupoService;

class GrupoController extends Controller
{
    /**
     * Busca grupo a  partir do ID
     * @param int $id
     */
    public function Buscar(int $id): JsonResponse
    {
        try
        {
            $grupo = GrupoService::findOne($id);
            if($grupo)
            {
                return response()->json($grupo);
            }
    
            return response()->json(['mensagem' => 'Grupo não encontrado'], 401);
        }
        catch(Exception $e)
        {
            return response()->json(['erro' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Listar grupos cadastrados
     */
    public function Listar(): JsonResponse
    {
        try
        {
            return response()->json(GrupoService::findAll());
        }
        catch(Exception $e)
        {
            return response()->json(['erro' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Cadstrar grupo
     * @param Request $request
     */
    public function Cadastrar(Request $request): JsonResponse
    {
        try
        {
            $validated = $request->validate([
                'nome' => 'required|max:50'
            ]);

            $grupo = GrupoService::Save([
                'nome' => $request->nome
            ]);

            return response()->json($grupo);
        }
        catch(Exception $e)
        {
            return response()->json(['erro' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Editar grupo
     * @param Request $request
     */
    public function Editar(Request $request): JsonResponse
    {
        try
        {
            $validated = $request->validate([
                'id' => 'required',
                'nome' => 'required|max:50'
            ]);

            $grupo = GrupoService::Save([
                'id' => $request->id,
                'nome' => $request->nome
            ]);

            return response()->json($grupo);
        }
        catch(Exception $e)
        {
            return response()->json(['erro' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Excluir grupo
     * @param int $id
     */
    public function Excluir(int $id): JsonResponse
    {
        try
        {
            if (GrupoService::delete($id))
                return response()->json(['mensagem' => 'Grupo deletado com sucesso']);
            else
                return response()->json(['mensagem' => 'Erro ao deletar o grupo'], 500);
        }
        catch(Exception $e)
        {
            return response()->json(['erro' => $e->getMessage()], 500);
        }
    }
}
