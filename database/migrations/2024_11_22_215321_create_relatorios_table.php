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
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('mes');
            $table->unsignedInteger('ano');
            $table->integer('total_ordens');
            $table->decimal('total_valor_gasto', 10, 2)->default(0);
            $table->decimal('total_valor_cobrado', 10, 2)->default(0);
            $table->decimal('total_mao_obra', 10, 2)->default(0);
            $table->decimal('total_descontos', 10, 2)->default(0);
            $table->integer('total_finalizadas')->default(0);
            $table->integer('total_em_andamento')->default(0);
            $table->integer('total_esperando')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relatorios');
    }
};
