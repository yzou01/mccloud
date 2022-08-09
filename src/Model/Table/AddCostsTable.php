<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addcosts Model
 *
 * @method \App\Model\Entity\Addcost newEmptyEntity()
 * @method \App\Model\Entity\Addcost newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Addcost[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Addcost get($primaryKey, $options = [])
 * @method \App\Model\Entity\Addcost findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Addcost patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Addcost[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Addcost|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Addcost saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Addcost[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Addcost[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Addcost[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Addcost[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AddcostsTable extends Table
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

        $this->setTable('addcosts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('duty')
            ->allowEmptyString('duty');

        $validator
            ->integer('freight_sea')
            ->allowEmptyString('freight_sea');

        $validator
            ->integer('cartage')
            ->allowEmptyString('cartage');

        $validator
            ->integer('insurance')
            ->allowEmptyString('insurance');

        $validator
            ->integer('licence')
            ->allowEmptyString('licence');

        $validator
            ->integer('agency')
            ->allowEmptyString('agency');

        $validator
            ->integer('customs')
            ->allowEmptyString('customs');

        $validator
            ->integer('TT_charge')
            ->allowEmptyString('TT_charge');

        $validator
            ->integer('miscellaneous')
            ->allowEmptyString('miscellaneous');

        return $validator;
    }
}
