<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Definitions Model
 *
 * @method \App\Model\Entity\Definition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Definition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Definition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Definition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Definition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Definition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Definition findOrCreate($search, callable $callback = null, $options = [])
 */
class DefinitionsTable extends Table
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

        $this->table('definitions');
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
            ->requirePresence('DEFINE', 'create')
            ->notEmpty('DEFINE');

        $validator
            ->requirePresence('EMAIL', 'create')
            ->notEmpty('EMAIL');

        $validator
            ->integer('CONTRIBUTE')
            ->requirePresence('CONTRIBUTE', 'create')
            ->notEmpty('CONTRIBUTE');

        return $validator;
    }
}
