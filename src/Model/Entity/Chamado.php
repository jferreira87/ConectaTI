<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chamado Entity
 *
 * @property int $id
 * @property int $cadastro_id
 * @property string $protocolo
 * @property string $status
 * @property \Cake\I18n\FrozenTime $abertura
 * @property \Cake\I18n\FrozenTime $agendamento
 * @property \Cake\I18n\FrozenTime $previsao_encerramento
 * @property int $responsavel_abertura
 * @property string $equipe_campo
 * @property string $arquivo_os
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Cadastro $cadastro
 */
class Chamado extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'cadastro_id' => true,
        'protocolo' => true,
        'status' => true,
        'abertura' => true,
        'agendamento' => true,
        'previsao_encerramento' => true,
        'responsavel_abertura' => true,
        'equipe_campo' => true,
        'arquivo_os' => true,
        'created' => true,
        'modified' => true,
        'cadastro' => true,
    ];
}
