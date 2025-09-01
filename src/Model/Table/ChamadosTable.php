<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chamados Model
 *
 * @property \App\Model\Table\CadastrosTable&\Cake\ORM\Association\BelongsTo $Cadastros
 *
 * @method \App\Model\Entity\Chamado newEmptyEntity()
 * @method \App\Model\Entity\Chamado newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Chamado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chamado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chamado findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Chamado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chamado[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chamado|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chamado saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chamado[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chamado[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chamado[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chamado[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChamadosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('chamados');
        $this->setDisplayField('protocolo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cadastros', [
            'foreignKey' => 'cadastro_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'responsavel_abertura',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('cadastro_id')
            ->notEmptyString('cadastro_id');

        $validator
            ->scalar('protocolo')
            ->maxLength('protocolo', 50)
            ->requirePresence('protocolo', 'create')
            ->notEmptyString('protocolo');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('abertura')
            ->requirePresence('abertura', 'create')
            ->notEmptyDateTime('abertura');

        $validator
            ->dateTime('agendamento')
            ->requirePresence('agendamento', 'create')
            ->notEmptyDateTime('agendamento');

        $validator
            ->dateTime('previsao_encerramento')
            ->requirePresence('previsao_encerramento', 'create')
            ->notEmptyDateTime('previsao_encerramento');

        $validator
            ->integer('responsavel_abertura')
            ->requirePresence('responsavel_abertura', 'create')
            ->notEmptyString('responsavel_abertura');

        $validator
            ->scalar('equipe_campo')
            ->maxLength('equipe_campo', 150)
            ->requirePresence('equipe_campo', 'create')
            ->notEmptyString('equipe_campo');

        $validator
            ->scalar('arquivo_os')
            ->maxLength('arquivo_os', 255)
            ->requirePresence('arquivo_os', 'create')
            ->notEmptyString('arquivo_os');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('cadastro_id', 'Cadastros'), ['errorField' => 'cadastro_id']);

        return $rules;
    }
}
