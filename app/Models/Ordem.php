<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome_cliente",
        "data_diagnostico",
        "tipo_produto",
        "telefone",
        "prioridade",
        "problemas",
        "teste_pecas",
        "valor_gasto",
        "mao_obra",
        "desconto",
        "valor_cobrado",
        "peca_trocada",
        "nome_tecnico",
        "status",
    ];
}
