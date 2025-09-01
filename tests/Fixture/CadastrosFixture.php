<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CadastrosFixture
 */
class CadastrosFixture extends TestFixture
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
                'login' => 'Lorem ipsum dolor sit amet',
                'nome' => 'Lorem ipsum dolor sit amet',
                'complemento' => 'Lorem ipsum dolor sit amet',
                'apartamento' => 'Lorem ipsum dolor sit amet',
                'bloco' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1756731902,
                'updated_at' => 1756731902,
            ],
        ];
        parent::init();
    }
}
