<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AddCosts Model
 *
 * @property \App\Model\Table\InvoicesTable&\Cake\ORM\Association\HasMany $Invoices
 *
 * @method \App\Model\Entity\AddCost newEmptyEntity()
 * @method \App\Model\Entity\AddCost newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AddCost[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AddCost get($primaryKey, $options = [])
 * @method \App\Model\Entity\AddCost findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AddCost patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AddCost[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AddCost|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AddCost saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AddCost[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AddCost[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AddCost[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AddCost[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AddCostsTable extends Table
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

        $this->setTable('add_costs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Invoices', [
            'foreignKey' => 'add_cost_id',
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
