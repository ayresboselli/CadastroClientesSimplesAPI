<?php

namespace App\Repositories;

use App\Models\Cliente;

use Illuminate\Database\Eloquent\Collection;

class ClienteRepository {

    /**
     * Busca cliente por ID
     * @param int $id
     * @return Cliente|null
     */
    public static function FindOne(int $id): Cliente|null
    {
        try
        {
            $cliente = Cliente::find($id);
            if ($cliente) $cliente->grupo;
            return $cliente;
        }
        catch (Except $e)
        {
            throw $e;
        }
    }

    /**
     * Lista todos os clientes
     * @return array
     */
    public static function FindAll(): Collection
    {
        try
        {
            return Cliente::get();
        }
        catch (Except $e)
        {
            throw $e;
        }
    }

    /**
     * Salva o cliente
     * @param array $param
     * @return Cliente
     */
    public static function Save(array $param): Cliente
    {
        try
        {
            $cliente = null;
            
            if (isset($param['id'])) 
            {
                $cliente = Cliente::find($param['id']);
            }
            
            if ($cliente)
            {
                $cliente->grupo_id = $param['grupo_id'];
                $cliente->nome = $param['nome'];
                $cliente->sobrenome = $param['sobrenome'];
                $cliente->cpf = $param['cpf'];
                $cliente->data_nascimento = $param['data_nascimento'];
                $cliente->email = $param['email'];
                $cliente->telefone = $param['telefone'];

                $cliente->save();

                $cliente->grupo;
            }
            else
            {
                $cliente = new Cliente([
                    'grupo_id' => $param['grupo_id'],
                    'nome' => $param['nome'],
                    'sobrenome' => $param['sobrenome'],
                    'cpf' => $param['cpf'],
                    'data_nascimento' => $param['data_nascimento'],
                    'email' => $param['email'],
                    'telefone' => $param['telefone'],
                ]);

                $cliente->save();

                $cliente->Grupo;
            }

            return $cliente;
        }
        catch (Except $e)
        {
            throw $e;
        }
    }

    /**
     * Exclui o cliente
     * @param int $id
     * @return bool
     */
    public static function Delete(int $id): bool
    {
        try
        {
            $cliente = Cliente::find($id);
            if ($cliente)
                return $cliente->delete();
            else
                return false;
        }
        catch (Except $e)
        {
            throw $e;
        }
    }
}