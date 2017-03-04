<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Means Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Words
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Categorys
 * @property \Cake\ORM\Association\HasMany $Commentmeans
 * @property \Cake\ORM\Association\HasMany $Likemeans
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
        $this->displayField('id');
        $this->primaryKey('id');

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
        $this->hasMany('Commentmeans', [
            'foreignKey' => 'mean_id'
        ]);
        $this->hasMany('Likemeans', [
            'foreignKey' => 'mean_id'
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
            ->requirePresence('mean', 'create')
            ->notEmpty('mean');

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
