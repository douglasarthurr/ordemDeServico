<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'mes',
        'ano',
        'total_ordens',
        'total_valor_gasto',
        'total_valor_cobrado',
        'total_mao_obra',
        'total_descontos',
        'total_finalizadas',
        'total_em_andamento',
        'total_esperando',
    ];
}
