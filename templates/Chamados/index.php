<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Chamado> $chamados
 */
?>
<div class="chamados index content">
    <?= $this->Html->link(__('New Chamado'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Chamados') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cadastro_id') ?></th>
                    <th><?= $this->Paginator->sort('protocolo') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('abertura') ?></th>
                    <th><?= $this->Paginator->sort('agendamento') ?></th>
                    <th><?= $this->Paginator->sort('previsao_encerramento') ?></th>
                    <th><?= $this->Paginator->sort('responsavel_abertura') ?></th>
                    <th><?= $this->Paginator->sort('equipe_campo') ?></th>
                    <th><?= $this->Paginator->sort('arquivo_os') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chamados as $chamado): ?>
                <tr>
                    <td><?= $this->Number->format($chamado->id) ?></td>
                    <td><?= $chamado->has('cadastro') ? $this->Html->link($chamado->cadastro->login, ['controller' => 'Cadastros', 'action' => 'view', $chamado->cadastro->id]) : '' ?></td>
                    <td><?= h($chamado->protocolo) ?></td>
                    <td><?= h($chamado->status) ?></td>
                    <td><?= h($chamado->abertura) ?></td>
                    <td><?= h($chamado->agendamento) ?></td>
                    <td><?= h($chamado->previsao_encerramento) ?></td>
                    <td><?= $this->Number->format($chamado->responsavel_abertura) ?></td>
                    <td><?= h($chamado->equipe_campo) ?></td>
                    <td><?= h($chamado->arquivo_os) ?></td>
                    <td><?= h($chamado->created) ?></td>
                    <td><?= h($chamado->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $chamado->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $chamado->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $chamado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chamado->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
