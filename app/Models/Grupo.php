<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cliente;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    /**
     * Clientes relacionado com o grupo
     */
    public function Clientes(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }
}
