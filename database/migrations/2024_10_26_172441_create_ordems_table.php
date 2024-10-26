<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordems', function (Blueprint $table) {
            $table->id();
            $table->string("nome_cliente");
            $table->date("data_diagnostico");
            $table->string("tipo_produto");
            $table->string("telefone");
            $table->string("prioridade");
            $table->string("problemas");
            $table->string("teste_pecas");
            // $table->string("finalizado");
            // $table->string("sem_conserto");
            // $table->string("aceito");
            // $table->string("recusado");
            $table->decimal("valor_gasto", 8,2);
            $table->decimal("mao_obra", 8,2);
            $table->decimal("desconto", 8,2);
            $table->decimal("valor_cobrado", 8,2);
            $table->string("peca_trocada");
            // $table->string("problema_solucionado");
            $table->string("nome_tecnico");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordems');
    }
};
