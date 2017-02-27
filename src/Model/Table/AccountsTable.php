<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accounts Model
 *
 * @method \App\Model\Entity\Account get($primaryKey, $options = [])
 * @method \App\Model\Entity\Account newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Account[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Account|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Account patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Account[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Account findOrCreate($search, callable $callback = null, $options = [])
 */
class AccountsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('accounts');
        $this->displayField('EMAIL');
        $this->primaryKey('EMAIL');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('ID')
            ->allowEmpty('ID', 'create');

        $validator
            ->requirePresence('EMAIL', 'create')
            ->notEmpty('EMAIL');

        $validator
            ->requirePresence('NAMEDISPLAY', 'create')
            ->notEmpty('NAMEDISPLAY');

        $validator
            ->requirePresence('PASSWORD', 'create')
            ->notEmpty('PASSWORD');

        $validator
            ->boolean('ISADMIN')
            ->requirePresence('ISADMIN', 'create')
            ->notEmpty('ISADMIN');

        $validator
            ->dateTime('CREATED')
            ->requirePresence('CREATED', 'create')
            ->notEmpty('CREATED');

        $validator
            ->dateTime('LAST_LOGIN')
            ->requirePresence('LAST_LOGIN', 'create')
            ->notEmpty('LAST_LOGIN');

        $validator
            ->integer('STATUS')
            ->requirePresence('STATUS', 'create')
            ->notEmpty('STATUS');

        $validator
            ->boolean('ACTIVE')
            ->requirePresence('ACTIVE', 'create')
            ->notEmpty('ACTIVE');

        return $validator;
    }
}
