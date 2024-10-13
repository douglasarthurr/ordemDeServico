<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriarOs extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_cliente',
        'data',
        'tipo_produto',
        'telefone_cliente',
        'prioridade',
        'problemas',
        'pecas',
        'finalizado',
        'nao_tem_conserto',
        'cliente_aceitou',
        'cliente_recusou',
        'valor_gasto',
        'mao_de_obra',
        'pecas_trocadas',
        'problemas_solucionados',
        'nome_tecnico',
    ];
}

