<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Likemeans Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Means
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Likemean get($primaryKey, $options = [])
 * @method \App\Model\Entity\Likemean newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Likemean[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Likemean|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Likemean patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Likemean[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Likemean findOrCreate($search, callable $callback = null, $options = [])
 */
class LikemeansTable extends Table
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

        $this->setTable('likemeans');
        $this->setDisplayField('mean_id');
        $this->setPrimaryKey(['mean_id', 'user_id']);

        $this->belongsTo('Means', [
            'foreignKey' => 'mean_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->integer('islike')
            ->requirePresence('islike', 'create')
            ->notEmpty('islike');

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
        $rules->add($rules->existsIn(['mean_id'], 'Means'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
