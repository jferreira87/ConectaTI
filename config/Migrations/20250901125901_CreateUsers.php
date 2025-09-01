<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('users');
        $table
            ->addColumn('nome', 'string', ['limit' => 150, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 180, 'null' => false])
            ->addColumn('senha', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('ativo', 'boolean', ['default' => true])
            ->addColumn('nivel', 'integer', ['default' => 1, 'comment' => '1=Usuário, 2=Admin'])
            ->addTimestamps()
            ->addIndex(['email'], ['unique' => true]) // evita e-mails duplicados
            ->create();
    }
}

