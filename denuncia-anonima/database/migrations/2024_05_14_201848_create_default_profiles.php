<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDefaultProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::table('perfis')->insert([
                ['nome' => 'admin'],
                ['nome' => 'denunciante'],
                ['nome' => 'analista'],
            ]);
        
        // Verificar se a tabela 'usuarios' tem a chave estrangeira 'id_perfil'
        Schema::table('usuarios', function (Blueprint $table) {
            if (!Schema::hasColumn('usuarios', 'id_perfil')) {
                // Tornar o campo nullable
                $table->unsignedBigInteger('id_perfil')->nullable()->change();
                
                // Verificar se a constraint já existe para evitar duplicidade
                $table->foreign('id_perfil', 'fk_usuarios_id_perfil')
                    ->references('id')->on('perfis')
                    ->onDelete('cascade'); // Exclusão em cascata
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Removendo a foreign key da tabela 'usuarios'
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign(['id_perfil']);
        });

        // Removendo os perfis padrão
        DB::table('perfis')->whereIn('nome', ['admin', 'denunciante', 'analista'])->delete();

        // Excluindo a tabela 'perfis' apenas se ela existir
        Schema::dropIfExists('perfis');
    }
}
