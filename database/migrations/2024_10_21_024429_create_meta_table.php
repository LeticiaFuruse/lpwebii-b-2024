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
        Schema::create('meta', function (Blueprint $table) {
            $table->id();
            $table->foreignId("projeto_id")->constrained("projeto")->onDelete("cascade");
            $table->string('meta_descricao');
            $table->string('meta_titulo');
            $table->dateTime('meta_prazo');
            $table->string('meta_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta');
    }
};
