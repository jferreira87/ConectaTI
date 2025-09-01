<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cadastro> $cadastros
 */
?>
<div class="cadastros index content">
    <?= $this->Html->link(__('New Cadastro'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cadastros') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('login') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('complemento') ?></th>
                    <th><?= $this->Paginator->sort('apartamento') ?></th>
                    <th><?= $this->Paginator->sort('bloco') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cadastros as $cadastro): ?>
                <tr>
                    <td><?= $this->Number->format($cadastro->id) ?></td>
                    <td><?= h($cadastro->login) ?></td>
                    <td><?= h($cadastro->nome) ?></td>
                    <td><?= h($cadastro->complemento) ?></td>
                    <td><?= h($cadastro->apartamento) ?></td>
                    <td><?= h($cadastro->bloco) ?></td>
                    <td><?= h($cadastro->created_at) ?></td>
                    <td><?= h($cadastro->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cadastro->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cadastro->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cadastro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cadastro->id)]) ?>
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
