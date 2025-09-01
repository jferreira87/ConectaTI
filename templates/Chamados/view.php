<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chamado $chamado
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Chamado'), ['action' => 'edit', $chamado->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Chamado'), ['action' => 'delete', $chamado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chamado->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Chamados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Chamado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chamados view content">
            <h3><?= h($chamado->protocolo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cadastro') ?></th>
                    <td><?= $chamado->has('cadastro') ? $this->Html->link($chamado->cadastro->login, ['controller' => 'Cadastros', 'action' => 'view', $chamado->cadastro->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Protocolo') ?></th>
                    <td><?= h($chamado->protocolo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($chamado->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipe Campo') ?></th>
                    <td><?= h($chamado->equipe_campo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Arquivo Os') ?></th>
                    <td><?= h($chamado->arquivo_os) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($chamado->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Responsavel Abertura') ?></th>
                    <td><?= $this->Number->format($chamado->responsavel_abertura) ?></td>
                </tr>
                <tr>
                    <th><?= __('Abertura') ?></th>
                    <td><?= h($chamado->abertura) ?></td>
                </tr>
                <tr>
                    <th><?= __('Agendamento') ?></th>
                    <td><?= h($chamado->agendamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Previsao Encerramento') ?></th>
                    <td><?= h($chamado->previsao_encerramento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($chamado->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($chamado->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
