<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\TipoDenuncia;

class CreateDefaultTiposDenuncia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adicionando o perfil usando Eloquent
        TipoDenuncia::create([
            'titulo' => 'titulo',
            'descricao' => 'descricao',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Removendo o perfil adicionado usando Eloquent
        TipoDenuncia::where('titulo', 'titulo')->delete();
    }
}
