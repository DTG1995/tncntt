<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Definitions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Words
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Categorys
 * @property \Cake\ORM\Association\HasMany $Commentdefinitions
 * @property \Cake\ORM\Association\HasMany $Likedefinitions
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

        $this->setTable('definitions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Words', [
            'foreignKey' => 'word_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categorys', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Commentdefinitions', [
            'foreignKey' => 'definition_id'
        ]);
        $this->hasMany('Likedefinitions', [
            'foreignKey' => 'definition_id'
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
            ->requirePresence('define', 'create')
            ->notEmpty('define');

        $validator
            ->integer('contribute')
            ->requirePresence('contribute', 'create')
            ->notEmpty('contribute');

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
        $rules->add($rules->existsIn(['word_id'], 'Words'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['category_id'], 'Categorys'));

        return $rules;
    }
}
