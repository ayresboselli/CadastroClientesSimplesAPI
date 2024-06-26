<?php

namespace App\Repositories;

use App\Models\Grupo;

use Illuminate\Database\Eloquent\Collection;

class GrupoRepository {

    /**
     * Busca grupo por ID
     * @param int $id
     * @return Grupo|null
     */
    public static function FindOne(int $id): Grupo|null
    {
        try
        {
            $grupo = Grupo::find($id);
            if ($grupo) $grupo->clientes;
            return $grupo;
        }
        catch (Except $e)
        {
            throw $e;
        }
    }

    /**
     * Lista todos os grupos
     * @return Collection
     */
    public static function FindAll(): Collection
    {
        try
        {
            return Grupo::get();
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
            $grupo = null;

            if (isset($param['id'])) 
            {
                $grupo = Grupo::find($param['id']);
            }
            
            if ($grupo)
            {
                $grupo->nome = $param['nome'];
                $grupo->save();

                $grupo->clientes;
            }
            else
            {
                $grupo = new Grupo(['nome' => $param['nome']]);
                $grupo->save();

                $grupo->Clientes;
            }

            return $grupo;
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
            $grupo = Grupo::find($id);
            if ($grupo)
                return $grupo->delete();
            else
                return false;
        }
        catch (Except $e)
        {
            throw $e;
        }
    }
}