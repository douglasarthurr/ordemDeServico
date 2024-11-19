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
            // não obrigatório para inserir no bd
            $table->string("problemas")->nullable();
            $table->string("teste_pecas")->nullable();
            $table->decimal("valor_gasto", 8,2)->nullable();
            $table->decimal("mao_obra", 8,2)->nullable();
            $table->decimal("desconto", 8,2)->nullable();
            $table->decimal("valor_cobrado", 8,2)->nullable();
            $table->string("peca_trocada")->nullable();
            // não obrigatório para inserir no bd
            $table->string("nome_tecnico");
            $table->string("status");
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
