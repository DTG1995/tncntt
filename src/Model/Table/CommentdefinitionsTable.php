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
        $this->hasMany('Commentdefinitions',[
            'foreignKey'=>'COMMENTDEFINITION_ID'
        ]);
        $this->belongsTo('Commentdefinitions',[
            'className'=>'Commentdefinitions',
            'foreignKey'=>'COMMENTDEFINITION_ID'
        ]);
        $this->belongsTo('Definitions',[
            'className'=>'Definitions',
            'foreignKey'=>'DEFINITION_ID'
        ]);
        $this->belongsTo('User',[
            'className'=>'Users',
            'foreignKey'=>'USER_ID',
            'propertyName'=>'User'
        ]);
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
            ->integer('COMMENTDEFINITION_ID')
            ->requirePresence('COMMENTDEFINITION_ID', 'create')
            ->notEmpty('COMMENTDEFINITION_ID');

        $validator
            ->integer('DEFINITION_ID')
            ->requirePresence('DEFINITION_ID', 'create')
            ->notEmpty('DEFINITION_ID');

        $validator
            ->integer('USER_ID')
            ->requirePresence('USER_ID', 'create')
            ->notEmpty('USER_ID');

        return $validator;
    }
}
