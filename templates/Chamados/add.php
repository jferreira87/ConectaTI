<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chamado $chamado
 * @var \Cake\Collection\CollectionInterface|string[] $cadastros
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Chamados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chamados form content">
            <?= $this->Form->create($chamado) ?>
            <fieldset>
                <legend><?= __('Add Chamado') ?></legend>
                <?php
                    echo $this->Form->control('cadastro_id', ['options' => $cadastros]);
                    echo $this->Form->control('protocolo');
                    echo $this->Form->control('status', [
                                        'type' => 'select',
                                        'options' => [
                                            'andamento' => 'Em andamento',
                                            'aguardando' => 'Aguardando',
                                            'encerrado' => 'Encerrado'
                                        ]
                                    ]);
                    echo $this->Form->control('abertura');
                    echo $this->Form->control('agendamento');
                    echo $this->Form->control('previsao_encerramento');
                    echo $this->Form->control('responsavel_abertura');
                    echo $this->Form->control('equipe_campo');
                    echo $this->Form->control('arquivo_os');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
