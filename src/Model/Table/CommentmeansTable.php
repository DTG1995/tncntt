<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commentmeans Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Commentmeans
 * @property \Cake\ORM\Association\BelongsTo $Means
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Commentmeans
 *
 * @method \App\Model\Entity\Commentmean get($primaryKey, $options = [])
 * @method \App\Model\Entity\Commentmean newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Commentmean[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Commentmean|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commentmean patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Commentmean[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Commentmean findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CommentmeansTable extends Table
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

        $this->table('commentmeans');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Parent', [
            'className'=>'Commentmeans',
            'foreignKey' => 'commentmean_id'
        ]);
        $this->belongsTo('Means', [
            'foreignKey' => 'mean_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Children', [
            'className'=>'Commentmeans',
            'foreignKey' => 'commentmean_id',
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
        $rules->add($rules->existsIn(['commentmean_id'], 'Commentmeans'));
        $rules->add($rules->existsIn(['mean_id'], 'Means'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
