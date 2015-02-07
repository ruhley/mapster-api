<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlaceTypes Model
 */
class PlaceTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('place_types');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('PlaceChangeVersions', [
            'foreignKey' => 'place_type_id'
        ]);
        $this->hasMany('PlaceChanges', [
            'foreignKey' => 'place_type_id'
        ]);
        $this->hasMany('PlaceTypeVersions', [
            'foreignKey' => 'place_type_id'
        ]);
        $this->hasMany('PlaceVersions', [
            'foreignKey' => 'place_type_id'
        ]);
        $this->hasMany('Places', [
            'foreignKey' => 'place_type_id'
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
            ->allowEmpty('link');

        return $validator;
    }
}
