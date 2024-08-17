<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\TipoDenuncia;

class CreateDefaultProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adicionando dois perfis usando Eloquent
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
        // Removendo os perfis adicionados usando Eloquent
        TipoDenuncia::where('titulo', 'titulo')->delete();
    }
}
