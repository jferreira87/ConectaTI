<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cadastro $cadastro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cadastros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cadastros form content">
            <?= $this->Form->create($cadastro) ?>
            <fieldset>
                <legend><?= __('Add Cadastro') ?></legend>
                <?php
                    echo $this->Form->control('login');
                    echo $this->Form->control('nome');
                    echo $this->Form->control('complemento');
                    echo $this->Form->control('apartamento');
                    echo $this->Form->control('bloco');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
