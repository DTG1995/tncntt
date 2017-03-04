<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commentdefinitions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Commentdefinitions
 * @property \Cake\ORM\Association\BelongsTo $Definitions
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Commentdefinitions
 *
 * @method \App\Model\Entity\Commentdefinition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Commentdefinition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Commentdefinition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Commentdefinition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commentdefinition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Commentdefinition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Commentdefinition findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->setTable('commentdefinitions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Commentdefinitions', [
            'foreignKey' => 'commentdefinition_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Definitions', [
            'foreignKey' => 'definition_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Commentdefinitions', [
            'foreignKey' => 'commentdefinition_id'
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
            ->requirePresence('content', 'create')
            ->notEmpty('content');

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
        $rules->add($rules->existsIn(['commentdefinition_id'], 'Commentdefinitions'));
        $rules->add($rules->existsIn(['definition_id'], 'Definitions'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
