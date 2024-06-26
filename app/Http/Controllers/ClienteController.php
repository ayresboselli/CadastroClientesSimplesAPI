<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\ClienteService;

class ClienteController extends Controller
{
    /**
     * Busca cliente a partir do ID
     * @param int $id
     */
    public function Buscar(int $id): JsonResponse
    {
        try
        {
            $cliente = ClienteService::findOne($id);
            if($cliente)
            {
                return response()->json($cliente);
            }
    
            return response()->json(['mensagem' => 'Cliente não encontrado'], 401);
        }
        catch(Exception $e)
        {
            return response()->json(['erro' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Listar clientes cadastrados
     */
    public function Listar(): JsonResponse
    {
        try
        {
            return response()->json(ClienteService::findAll());
        }
        catch(Exception $e)
        {
            return response()->json(['erro' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Cadstrar cliente
     * @param Request $request
     */
    public function Cadastrar(Request $request): JsonResponse
    {
        try
        {
            $validated = $request->validate([
                'grupo_id' => 'required',
                'nome' => 'required|max:50',
                'sobrenome' => 'required',
                'cpf' => 'required|cpf',
                'data_nascimento' => 'required|date',
                'email' => 'email',
                'telefone' => '',
            ]);

            $cliente = ClienteService::Save([
                'grupo_id' => $request->grupo_id,
                'nome' => $request->nome,
                'sobrenome' => $request->sobrenome,
                'cpf' => $request->cpf,
                'data_nascimento' => $request->data_nascimento,
                'email' => $request->email,
                'telefone' => $request->telefone,
            ]);

            return response()->json($cliente);
        }
        catch(Exception $e)
        {
            return response()->json(['erro' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Editar cliente
     * @param Request $request
     */
    public function Editar(Request $request): JsonResponse
    {
        try
        {
            $validated = $request->validate([
                'id' => 'required',
                'grupo_id' => 'required',
                'nome' => 'required|max:50',
                'sobrenome' => 'required',
                'cpf' => 'required|cpf',
                'data_nascimento' => 'required|date',
                'email' => 'email',
                'telefone' => '',
            ]);

            $cliente = ClienteService::Save([
                'id' => $request->id,
                'grupo_id' => $request->grupo_id,
                'nome' => $request->nome,
                'sobrenome' => $request->sobrenome,
                'cpf' => $request->cpf,
                'data_nascimento' => $request->data_nascimento,
                'email' => $request->email,
                'telefone' => $request->telefone,
            ]);

            return response()->json($cliente);
        }
        catch(Exception $e)
        {
            return response()->json(['erro' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Excluir cliente
     * @param int $id
     */
    public function Excluir(int $id): JsonResponse
    {
        try
        {
            if (ClienteService::delete($id))
                return response()->json(['mensagem' => 'Cliente deletado com sucesso']);
            else
                return response()->json(['mensagem' => 'Erro ao deletar o cliente'], 500);
        }
        catch(Exception $e)
        {
            return response()->json(['erro' => $e->getMessage()], 500);
        }
    }
}
