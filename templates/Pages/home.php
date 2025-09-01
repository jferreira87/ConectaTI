<div class="dashboard">
    <h2>Dashboard</h2>

    <div class="stats">
        <div class="card">
            <h3><?= $totalCadastros ?></h3>
            <p>Cadastros</p>
        </div>
        <div class="card">
            <h3><?= $aguardando ?></h3>
            <p>Chamados Aguardando</p>
        </div>
        <div class="card">
            <h3><?= $andamento ?></h3>
            <p>Chamados em Andamento</p>
        </div>
    </div>

    <div class="actions">
        <?= $this->Html->link('Novo Chamado', ['controller' => 'Chamados', 'action' => 'add'], ['class' => 'button']) ?>
        <?= $this->Html->link('Novo Cadastro', ['controller' => 'Cadastros', 'action' => 'add'], ['class' => 'button']) ?>
    </div>

    <h3>Chamados em Aberto</h3>
    <table>
        <thead>
            <tr>
                <th>Protocolo</th>
                <th>Login</th>
                <th>Nome</th>
                <th>Complemento</th>
                <th>Bloco</th>
                <th>Apartamento</th>
                <th>Status</th>
                <th>Abertura</th>
                <th>Responsável</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($chamadosAbertos as $chamado): ?>
            <tr>
                <td><?= h($chamado->protocolo) ?></td>
                <td><?= h($chamado->cadastro->login) ?></td>
                <td><?= h($chamado->cadastro->nome) ?></td>
                <td><?= h($chamado->cadastro->complemento) ?></td>
                <td><?= h($chamado->cadastro->bloco) ?></td>
                <td><?= h($chamado->cadastro->apartamento) ?></td>

                <td>
                    <?php
                    $statusColors = [
                        'aguardando' => 'red',
                        'andamento' => 'orange',
                        'encerrado' => 'green'
                    ];
                    $color = $statusColors[$chamado->status] ?? 'black';
                    ?>
                    <span style="color: <?= $color ?>; font-weight: bold;">
                        <?= h(ucfirst($chamado->status)) ?>
                    </span>
                
                <td><?= $chamado->abertura->format('d/m/Y H:i') ?></td>
                <td><?= h($chamado->user->nome ?? '') ?></td>
                <td>
                    <?php if ($chamado->status !== 'encerrado'): ?>
                        <?= $this->Form->postLink(
                            'Encerrar',
                            ['controller' => 'Chamados', 'action' => 'edit', $chamado->id],
                            ['confirm' => 'Deseja encerrar este chamado?', 'class' => 'button danger']
                        ) ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
.dashboard .stats { display: flex; gap: 20px; margin-bottom: 20px; }
.dashboard .card { background: #f2f2f2; padding: 15px; border-radius: 8px; text-align: center; flex: 1; }
.dashboard .button { background: #007bff; color: white; padding: 8px 12px; border-radius: 5px; text-decoration: none; }
.dashboard .button.danger { background: #dc3545; }
table { width: 100%; border-collapse: collapse; margin-top: 20px; }
table th, table td { border: 1px solid #ddd; padding: 8px; }
</style>
