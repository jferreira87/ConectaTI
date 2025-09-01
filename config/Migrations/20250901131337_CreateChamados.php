<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateChamados extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('chamados');
        $table->addColumn('cadastro_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('protocolo', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('status', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('abertura', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('agendamento', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('previsao_encerramento', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('responsavel_abertura', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('equipe_campo', 'string', [
            'default' => null,
            'limit' => 150,
            'null' => false,
        ]);
        $table->addColumn('arquivo_os', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex([
            'agendamento',
        
            ], [
            'name' => 'BY_AGENDAMENTO',
            'unique' => false,
        ]);
        $table->addIndex([
            'previsao_encerramento',
        
            ], [
            'name' => 'BY_PREVISAO_ENCERRAMENTO',
            'unique' => false,
        ]);
        $table->addIndex([
            'equipe_campo',
        
            ], [
            'name' => 'BY_EQUIPE_CAMPO',
            'unique' => false,
        ]);
        $table->addIndex([
            'arquivo_os',
        
            ], [
            'name' => 'BY_ARQUIVO_OS',
            'unique' => false,
        ]);
        $table->create();
    }
}
