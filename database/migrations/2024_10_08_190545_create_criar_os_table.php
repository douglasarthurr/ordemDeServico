<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('criar_os', function (Blueprint $table) {
            $table->string('nome_cliente');
            $table->date('data');
            $table->string('tipo_produto')->nullable();
            $table->string('telefone_cliente')->nullable();
            $table->string('prioridade');
            $table->text('problemas')->nullable();
            $table->text('pecas')->nullable();
            $table->boolean('finalizado')->default(false);
            $table->boolean('nao_tem_conserto')->default(false);
            $table->boolean('cliente_aceitou')->default(false);
            $table->boolean('cliente_recusou')->default(false);
            $table->decimal('valor_gasto', 10, 2)->nullable();
            $table->decimal('mao_de_obra', 10, 2)->nullable();
            $table->text('pecas_trocadas')->nullable();
            $table->text('problemas_solucionados')->nullable();
            $table->string('nome_tecnico')->nullable();
            $table->timestamps();
        });
    }
        /**
         * Reverse the migrations.
         */
    public function down(): void
    {
        Schema::dropIfExists('criar_os');
    }
};
