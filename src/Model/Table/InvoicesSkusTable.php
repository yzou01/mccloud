<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InvoicesSkus Model
 *
 * @property \App\Model\Table\InvoicesTable&\Cake\ORM\Association\BelongsTo $Invoices
 * @property \App\Model\Table\SkusTable&\Cake\ORM\Association\BelongsTo $Skus
 *
 * @method \App\Model\Entity\InvoicesSkus newEmptyEntity()
 * @method \App\Model\Entity\InvoicesSkus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\InvoicesSkus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InvoicesSkus get($primaryKey, $options = [])
 * @method \App\Model\Entity\InvoicesSkus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\InvoicesSkus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InvoicesSkus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InvoicesSkus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvoicesSkus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvoicesSkus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InvoicesSkus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\InvoicesSkus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InvoicesSkus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class InvoicesSkusTable extends Table
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

        $this->setTable('invoices_skus');
        $this->setDisplayField(['invoice_id', 'sku_id']);
        $this->setPrimaryKey(['invoice_id', 'sku_id']);

        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Skus', [
            'foreignKey' => 'sku_id',
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
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

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
        $rules->add($rules->existsIn('invoice_id', 'Invoices'), ['errorField' => 'invoice_id']);
        $rules->add($rules->existsIn('sku_id', 'Skus'), ['errorField' => 'sku_id']);

        return $rules;
    }
}
