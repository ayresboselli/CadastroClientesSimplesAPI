<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

use App\Models\Grupo;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['grupo_id', 'nome', 'sobrenome', 'cpf', 'data_nascimento', 'email', 'telefone'];

    /**
     * Grupo ao qual o cliente pertence
     */
    public function Grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo::class);
    }
}
