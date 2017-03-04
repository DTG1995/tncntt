<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Likedefinitions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Definitions
 * @property \Cake\ORM\Association\BelongsTo $Users
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

        $this->setTable('likedefinitions');
        $this->setDisplayField('definition_id');
        $this->setPrimaryKey(['definition_id', 'user_id']);


        $this->belongsTo('Definitions', [
            'foreignKey' => 'definition_id',
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
        $rules->add($rules->existsIn(['definition_id'], 'Definitions'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
