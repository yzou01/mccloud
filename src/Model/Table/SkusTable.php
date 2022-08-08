<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Skus Model
 *
 * @property \App\Model\Table\TypesTable&\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\FactoriesTable&\Cake\ORM\Association\BelongsTo $Factories
 *
 * @method \App\Model\Entity\Skus newEmptyEntity()
 * @method \App\Model\Entity\Skus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Skus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Skus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Skus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Skus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Skus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Skus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Skus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Skus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Skus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Skus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Skus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SkusTable extends Table
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

        $this->setTable('skus');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Factories', [
            'foreignKey' => 'factory_id',
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
            ->scalar('name')
            ->maxLength('name', 30)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->integer('type_id')
            ->requirePresence('type_id', 'create')
            ->notEmptyString('type_id');

        $validator
            ->integer('factory_id')
            ->requirePresence('factory_id', 'create')
            ->notEmptyString('factory_id');

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
        $rules->add($rules->existsIn('type_id', 'Types'), ['errorField' => 'type_id']);
        $rules->add($rules->existsIn('factory_id', 'Factories'), ['errorField' => 'factory_id']);

        return $rules;
    }
}
