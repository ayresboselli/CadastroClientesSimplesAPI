<?php

namespace App\Services;

use App\Repositories\ClienteRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Cliente;

class ClienteService {

    /**
     * Busca cliente por ID
     * @param int $id
     * @return Cliente|null
     */
    public static function FindOne(int $id): Cliente|null
    {
        try
        {
            return ClienteRepository::FindOne($id);
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
            return ClienteRepository::FindAll();
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
            return ClienteRepository::Save($param);
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
            return ClienteRepository::Delete($id);
        }
        catch (Except $e)
        {
            throw $e;
        }
    }
}