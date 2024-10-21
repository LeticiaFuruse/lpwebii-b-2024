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
        Schema::create('tarefa', function (Blueprint $table) {
            $table->id();
            $table->foreignId("meta_id")->constrained("meta")->onDelete("cascade")->nullable();
            $table->foreignId("projeto_id")->constrained("projeto")->onDelete("cascade");
            $table->string('tarefa_titulo');
            $table->string('tarefa_descricao')->nullable();
            $table->string('tarefa_status');
            $table->dateTime('tarefa_data_conclusao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefa');
    }
};
