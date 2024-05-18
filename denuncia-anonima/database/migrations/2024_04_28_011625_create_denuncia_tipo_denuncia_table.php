<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciaTipoDenunciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncia_tipo_denuncia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('denuncia_id');
            $table->unsignedBigInteger('tipo_denuncia_id');
            $table->foreign('denuncia_id')->references('id')->on('denuncias')->onDelete('cascade');
            $table->foreign('tipo_denuncia_id')->references('id')->on('tipos_denuncia')->onDelete('cascade');
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
        Schema::dropIfExists('denuncia_tipo_denuncia');
    }
}
