<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commentmeans Model
 *
 * @method \App\Model\Entity\Commentmean get($primaryKey, $options = [])
 * @method \App\Model\Entity\Commentmean newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Commentmean[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Commentmean|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commentmean patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Commentmean[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Commentmean findOrCreate($search, callable $callback = null, $options = [])
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
        $this->hasMany('Commentmeans',[
            'foreignKey'=>'COMMENTMEAN_ID'
        ]);
        $this->belongsTo('Commentmeans',[
            'className'=>'Commentmeans',
            'foreignKey'=>'COMMENTMEAN_ID'
        ]);
        $this->belongsTo('Means',[
            'className'=>'Means',
            'foreignKey'=>'MEAN_ID'
        ]);
        $this->belongsTo('Users',[
            'className'=>'Users',
            'foreignKey'=>'USER_ID',
            'propertyName'=>'User'
        ]);
        $this->table('commentmeans');
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
            ->integer('COMMENTMEAN_ID')
            ->allowEmpty('COMMENTMEAN_ID');

        $validator
            ->integer('MEAN_ID')
            ->requirePresence('MEAN_ID', 'create')
            ->notEmpty('MEAN_ID');

        $validator
            ->integer('USER_ID')
            ->requirePresence('USER_ID', 'create')
            ->notEmpty('USER_ID');

        return $validator;
    }
}
