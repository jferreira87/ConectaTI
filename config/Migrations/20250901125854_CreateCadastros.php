<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCadastros extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('cadastros');
        $table
            ->addColumn('login', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('nome', 'string', ['limit' => 150, 'null' => false])
            ->addColumn('complemento', 'string', ['limit' => 150, 'null' => true, 'default' => null])
            ->addColumn('apartamento', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addColumn('bloco', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addTimestamps() // cria created e modified
            ->create();
    }
}

