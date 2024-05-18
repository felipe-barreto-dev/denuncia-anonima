<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->string('protocolo');
            $table->text('descricao');
            $table->string('titulo');
            $table->integer('pessoas_afetadas');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_responsavel')->nullable(); // Permitir nulo se aplicável

            // Chaves estrangeiras
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_responsavel')->references('id')->on('usuarios')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denuncias');
    }
}
