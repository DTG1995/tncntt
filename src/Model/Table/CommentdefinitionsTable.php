<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commentdefinitions Model
 *
 * @method \App\Model\Entity\Commentdefinition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Commentdefinition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Commentdefinition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Commentdefinition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commentdefinition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Commentdefinition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Commentdefinition findOrCreate($search, callable $callback = null, $options = [])
 */
class CommentdefinitionsTable extends Table
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

        $this->table('commentdefinitions');
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
            ->requirePresence('CONTENT', 'create')
            ->notEmpty('CONTENT');

        $validator
            ->dateTime('CREATED')
            ->requirePresence('CREATED', 'create')
            ->notEmpty('CREATED');

        $validator
            ->integer('IDPARENT')
            ->requirePresence('IDPARENT', 'create')
            ->notEmpty('IDPARENT');

        $validator
            ->integer('IDDEFINITION')
            ->requirePresence('IDDEFINITION', 'create')
            ->notEmpty('IDDEFINITION');

        $validator
            ->requirePresence('EMAIL', 'create')
            ->notEmpty('EMAIL');

        return $validator;
    }
}
