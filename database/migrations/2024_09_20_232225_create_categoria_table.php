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
        Schema::create('categoria', function (Blueprint $table) {
            $table->id(); //inteiro - primary key - autoinc
            $table->string('cat_nome');
            $table->string('cat_descricao')->nullable(); //nullable() siginifica que não é campo obrigatorio
            $table->boolean('cat_ativo')->default(1); //default serve para tornar ativo ou inativo (para não usar DELETE)
             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria');
    }
};
