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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('producto_evento_id');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('producto_evento_id')->references('id')->on('producto_eventos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->decimal('precio', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
