<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexosDenunciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexos_denuncia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_denuncia');
            $table->string('caminho_arquivo');
            $table->string('nome_arquivo');
            $table->timestamps();

            $table->foreign('id_denuncia')->references('id')->on('denuncias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anexos_denuncia');
    }
}
