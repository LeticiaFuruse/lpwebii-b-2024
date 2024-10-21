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
        Schema::create('colaborador_tarefa', function (Blueprint $table) {
            $table->unsignedBigInteger('colaborador_id');
            $table->foreign("colaborador_id")->references("id")->on('colaborador')->onDelete("cascade");

            $table->unsignedBigInteger('tarefa_id');
            $table->foreign("tarefa_id")->references("id")->on('tarefa')->onDelete("cascade");

            $table->primary(['colaborador_id', 'tarefa_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborador_tarefa');
    }
};
