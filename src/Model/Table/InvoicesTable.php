<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Invoices Model
 *
 * @property \App\Model\Table\FactoriesTable&\Cake\ORM\Association\BelongsTo $Factories
 * @property \App\Model\Table\AdditionalcostsTable&\Cake\ORM\Association\HasMany $Additionalcosts
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 *
 * @method \App\Model\Entity\Invoice newEmptyEntity()
 * @method \App\Model\Entity\Invoice newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Invoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Invoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Invoice findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Invoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Invoice saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class InvoicesTable extends Table
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

        $this->setTable('invoices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Factories', [
            'foreignKey' => 'factory_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Additionalcosts', [
            'foreignKey' => 'invoice_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'invoice_id',
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
            ->scalar('number')
            ->maxLength('number', 10)
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->scalar('currency_of_origin')
            ->maxLength('currency_of_origin', 20)
            ->requirePresence('currency_of_origin', 'create')
            ->notEmptyString('currency_of_origin');

        $validator
            ->numeric('currency_rate')
            ->requirePresence('currency_rate', 'create')
            ->notEmptyString('currency_rate');

        $validator
            ->scalar('gst')
            ->allowEmptyString('gst');

        $validator
            ->integer('factory_id')
            ->requirePresence('factory_id', 'create')
            ->notEmptyString('factory_id');

        $validator
            ->decimal('discount')
            ->allowEmptyString('discount');

        $validator
            ->boolean('archive')
            ->notEmptyString('archive');

            $validator
            ->numeric('total')
            ->allowEmptyString('total');

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
        $rules->add($rules->existsIn('factory_id', 'Factories'), ['errorField' => 'factory_id']);

        return $rules;
    }
}
