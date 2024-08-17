<?php

use Illuminate\Database\Migrations\Migration;

class CreateDefaultProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adicionando dois perfis
        DB::table('tipos_denuncia')->insert([
            ['titulo' => 'titulo', 'descricao' => 'descricao'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Removendo os perfis adicionados
        DB::table('tipos_denuncia')->whereIn('titulo', ['teste'])->delete();
    }
}
