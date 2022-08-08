<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Factories Model
 *
 * @property \App\Model\Table\SkusTable&\Cake\ORM\Association\HasMany $Skus
 *
 * @method \App\Model\Entity\Factory newEmptyEntity()
 * @method \App\Model\Entity\Factory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Factory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Factory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Factory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Factory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Factory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Factory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Factory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Factory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Factory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Factory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Factory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FactoriesTable extends Table
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

        $this->setTable('factories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Skus', [
            'foreignKey' => 'factory_id',
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
            ->maxLength('name', 25)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
