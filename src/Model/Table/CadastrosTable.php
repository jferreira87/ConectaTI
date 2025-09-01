<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cadastros Model
 *
 * @method \App\Model\Entity\Cadastro newEmptyEntity()
 * @method \App\Model\Entity\Cadastro newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Cadastro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cadastro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cadastro findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Cadastro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cadastro[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cadastro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cadastro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cadastro[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cadastro[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cadastro[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cadastro[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CadastrosTable extends Table
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

        $this->setTable('cadastros');
        $this->setDisplayField('login');
        $this->setPrimaryKey('id');

        $this->hasMany('Chamados', [
            'foreignKey' => 'cadastro_id',
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
            ->scalar('login')
            ->maxLength('login', 100)
            ->requirePresence('login', 'create')
            ->notEmptyString('login');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 150)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 150)
            ->allowEmptyString('complemento');

        $validator
            ->scalar('apartamento')
            ->maxLength('apartamento', 50)
            ->allowEmptyString('apartamento');

        $validator
            ->scalar('bloco')
            ->maxLength('bloco', 50)
            ->allowEmptyString('bloco');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

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
        $rules->add($rules->isUnique(['login']), ['errorField' => 'login']);

        return $rules;
    }
}
