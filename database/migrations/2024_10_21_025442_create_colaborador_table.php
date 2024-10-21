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
        Schema::create('colaborador', function (Blueprint $table) {
            $table->id();
            $table->foreignId("usuario_id")->constrained("usuario")->onDelete("cascade");
            $table->foreignId("projeto_id")->constrained("projeto")->onDelete("cascade");
            $table->dateTime('colaborador_data_admissao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborador');
    }
};
