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
        Schema::create('respostas_denuncias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_denuncia');
            $table->unsignedBigInteger('id_usuario');
            $table->string('mensagem');
            $table->date('data_envio');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_denuncia')->references('id')->on('denuncias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
