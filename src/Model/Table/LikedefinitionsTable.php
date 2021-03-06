<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Likedefinitions Model
 *
 * @method \App\Model\Entity\Likedefinition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Likedefinition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Likedefinition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Likedefinition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Likedefinition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Likedefinition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Likedefinition findOrCreate($search, callable $callback = null, $options = [])
 */
class LikedefinitionsTable extends Table
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

        $this->table('likedefinitions');
        $this->displayField('IDDEFINITION');
        $this->primaryKey(['IDDEFINITION', 'ACCOUNT']);
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
            ->integer('DEFINITIONS_ID')
            ->allowEmpty('DEFINITIONS_ID', 'create');

        $validator
            ->integer('USERS_ID')
            ->allowEmpty('USERS_ID', 'create');

        $validator
            ->integer('ISLIKE')
            ->requirePresence('ISLIKE', 'create')
            ->notEmpty('ISLIKE');

        return $validator;
    }
}
