<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Places Model
 */
class PlacesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('places');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('PlaceTypes', [
            'foreignKey' => 'place_type_id'
        ]);
        $this->belongsTo('Maps', [
            'foreignKey' => 'map_id'
        ]);
        $this->hasMany('PlaceChangeVersions', [
            'foreignKey' => 'place_id'
        ]);
        $this->hasMany('PlaceChanges', [
            'foreignKey' => 'place_id'
        ]);
        $this->hasMany('PlaceVersions', [
            'foreignKey' => 'place_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator instance
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->allowEmpty('description')
            ->allowEmpty('image')
            ->allowEmpty('link')
            ->add('place_type_id', 'valid', ['rule' => 'numeric'])
            ->requirePresence('place_type_id', 'create')
            ->notEmpty('place_type_id')
            ->requirePresence('coordinates', 'create')
            ->notEmpty('coordinates')
            ->add('map_id', 'valid', ['rule' => 'numeric'])
            ->requirePresence('map_id', 'create')
            ->notEmpty('map_id');

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
        $rules->add($rules->existsIn(['place_type_id'], 'PlaceTypes'));
        $rules->add($rules->existsIn(['map_id'], 'Maps'));
        return $rules;
    }
}
