<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\TipoDenuncia;

class PopulateTiposDenuncia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tiposDenuncia = [
            [
                'titulo' => 'Assédio moral',
                'descricao' => 'Assédio moral na faculdade envolve atitudes ou comportamentos que visam humilhar ou menosprezar um indivíduo de forma sistemática e repetida.',
            ],
            [
                'titulo' => 'Injúria racial',
                'descricao' => 'Injúria racial refere-se a ofensas ou ataques baseados na raça ou etnia de uma pessoa, prejudicando seu bem-estar e dignidade.',
            ],
            [
                'titulo' => 'Assédio sexual',
                'descricao' => 'Assédio sexual na faculdade é qualquer comportamento sexual indesejado, como comentários, toques ou propostas, que cria um ambiente hostil e afeta a dignidade da pessoa.',
            ],
            [
                'titulo' => 'Furto',
                'descricao' => 'Furto refere-se à subtração não autorizada de bens de outros membros da comunidade acadêmica, como equipamentos, materiais ou objetos pessoais.',
            ],
            [
                'titulo' => 'Homofobia',
                'descricao' => 'Homofobia é a discriminação ou hostilidade direcionada a indivíduos com orientações sexuais não heteronormativas, criando um ambiente hostil e excluindo esses indivíduos.',
            ],
            [
                'titulo' => 'Transfobia',
                'descricao' => 'Transfobia é a discriminação ou hostilidade contra pessoas transgênero, prejudicando sua inclusão e respeito dentro da comunidade acadêmica.',
            ],
            [
                'titulo' => 'Bullying',
                'descricao' => 'Bullying envolve comportamentos repetidos de intimidação, agressão ou exclusão que visam prejudicar a integridade e o bem-estar de um estudante.',
            ],
            [
                'titulo' => 'Discriminação religiosa',
                'descricao' => 'Discriminação religiosa é qualquer ato de hostilidade ou exclusão com base nas crenças ou práticas religiosas de um indivíduo.',
            ],
            [
                'titulo' => 'Atentado ao pudor',
                'descricao' => 'Atentado ao pudor refere-se a comportamentos ou atos que violam as normas de decoro e respeito, causando constrangimento ou desconforto para outros.',
            ],
            [
                'titulo' => 'Outros',
                'descricao' => 'Outros tipos de denúncias que não se encaixam nas categorias especificadas, mas que ainda envolvem comportamentos inaceitáveis na instituição.',
            ],
        ];

        foreach ($tiposDenuncia as $tipo) {
            TipoDenuncia::create($tipo);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        TipoDenuncia::whereIn('titulo', [
            'Assédio moral',
            'Injúria racial',
            'Assédio sexual',
            'Furto',
            'Homofobia',
            'Transfobia',
            'Bullying',
            'Discriminação religiosa',
            'Atentado ao pudor',
            'Outros'
        ])->delete();
    }
}
