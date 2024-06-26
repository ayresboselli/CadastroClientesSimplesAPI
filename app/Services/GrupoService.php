<?php

namespace App\Services;

use App\Repositories\GrupoRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Grupo;

class GrupoService {

    /**
     * Busca grupo por ID
     * @param int $id
     * @return Grupo|null
     */
    public static function FindOne(int $id): Grupo|null
    {
        try
        {
            return GrupoRepository::FindOne($id);
        }
        catch (Except $e)
        {
            throw $e;
        }
    }

    /**
     * Lista todos os grupos
     * @return array
     */
    public static function FindAll(): Collection
    {
        try
        {
            return GrupoRepository::FindAll();
        }
        catch (Except $e)
        {
            throw $e;
        }
    }

    /**
     * Salva o grupo
     * @param array $param
     * @return Grupo
     */
    public static function Save(array $param): Grupo
    {
        try
        {
            return GrupoRepository::Save($param);
        }
        catch (Except $e)
        {
            throw $e;
        }
    }

    /**
     * Exclui o grupo
     * @param int $id
     * @return bool
     */
    public static function Delete(int $id): bool
    {
        try
        {
            return GrupoRepository::Delete($id);
        }
        catch (Except $e)
        {
            throw $e;
        }
    }
}