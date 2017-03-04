<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Commentdefinitions
 * @property \Cake\ORM\Association\HasMany $Commentmeans
 * @property \Cake\ORM\Association\HasMany $Definitions
 * @property \Cake\ORM\Association\HasMany $Likedefinitions
 * @property \Cake\ORM\Association\HasMany $Likemeans
 * @property \Cake\ORM\Association\HasMany $Means
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('namedisplay');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Commentdefinitions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Commentmeans', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Definitions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Likedefinitions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Likemeans', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Means', [
            'foreignKey' => 'user_id'
        ]);
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('namedisplay', 'create')
            ->notEmpty('namedisplay');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->boolean('isadmin')
            ->requirePresence('isadmin', 'create')
            ->notEmpty('isadmin');

        $validator
            ->dateTime('last_login')
            ->requirePresence('last_login', 'create')
            ->notEmpty('last_login');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
