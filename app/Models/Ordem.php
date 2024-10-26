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
        // "finalizado",
        // "sem_conserto",
        // "aceito",
        // "recusado",
        "valor_gasto",
        "mao_obra",
        "desconto",
        "valor_cobrado",
        "peca_trocada",
        // "problema_solucionado",
        "nome_tecnico",
    ];
}
