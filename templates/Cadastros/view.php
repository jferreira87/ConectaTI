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
            <?= $this->Html->link(__('Edit Cadastro'), ['action' => 'edit', $cadastro->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cadastro'), ['action' => 'delete', $cadastro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cadastro->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cadastros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cadastro'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cadastros view content">
            <h3><?= h($cadastro->login) ?></h3>
            <table>
                <tr>
                    <th><?= __('Login') ?></th>
                    <td><?= h($cadastro->login) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($cadastro->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Complemento') ?></th>
                    <td><?= h($cadastro->complemento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apartamento') ?></th>
                    <td><?= h($cadastro->apartamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bloco') ?></th>
                    <td><?= h($cadastro->bloco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cadastro->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($cadastro->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($cadastro->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
