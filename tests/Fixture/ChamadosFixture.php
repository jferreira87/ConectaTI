<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChamadosFixture
 */
class ChamadosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'cadastro_id' => 1,
                'protocolo' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor ',
                'abertura' => '2025-09-01 13:15:11',
                'agendamento' => '2025-09-01 13:15:11',
                'previsao_encerramento' => '2025-09-01 13:15:11',
                'responsavel_abertura' => 1,
                'equipe_campo' => 'Lorem ipsum dolor sit amet',
                'arquivo_os' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-09-01 13:15:11',
                'modified' => '2025-09-01 13:15:11',
            ],
        ];
        parent::init();
    }
}
