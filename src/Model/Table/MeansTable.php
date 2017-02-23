<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Means Model
 *
 * @method \App\Model\Entity\Mean get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mean newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mean[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mean|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mean patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mean[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mean findOrCreate($search, callable $callback = null, $options = [])
 */
class MeansTable extends Table
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

        $this->table('means');
        $this->displayField('ID');
        $this->primaryKey('ID');
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
            ->integer('IDWORD')
            ->requirePresence('IDWORD', 'create')
            ->notEmpty('IDWORD');

        $validator
            ->requirePresence('MEAN', 'create')
            ->notEmpty('MEAN');

        $validator
            ->integer('CONTRIBUTE')
            ->requirePresence('CONTRIBUTE', 'create')
            ->notEmpty('CONTRIBUTE');

        $validator
            ->requirePresence('EMAIL', 'create')
            ->notEmpty('EMAIL');

        return $validator;
    }
}
