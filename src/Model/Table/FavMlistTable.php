<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FavMlist Model
 *
 * @method \App\Model\Entity\FavMlist get($primaryKey, $options = [])
 * @method \App\Model\Entity\FavMlist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FavMlist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FavMlist|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FavMlist saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FavMlist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FavMlist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FavMlist findOrCreate($search, callable $callback = null, $options = [])
 */
class FavMlistTable extends Table
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

        $this->setTable('fav_mlist');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('player')
            ->maxLength('player', 100)
            ->requirePresence('player', 'create')
            ->notEmptyString('player');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 45)
            ->requirePresence('genre', 'create')
            ->notEmptyString('genre');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->allowEmptyString('url');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmptyFile('image');

        return $validator;
    }
}
