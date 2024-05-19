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
        DB::table('perfis')->insert([
            ['nome' => 'admin'],
            ['nome' => 'denunciante'],
            ['nome' => 'analista'],
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
        DB::table('perfis')->whereIn('nome', ['admin', 'denunciante', 'analista'])->delete();
    }
}
