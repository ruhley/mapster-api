<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Universes Model
 */
class UniversesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('universes');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('CharacterChangeVersions', [
            'foreignKey' => 'universe_id'
        ]);
        $this->hasMany('CharacterChanges', [
            'foreignKey' => 'universe_id'
        ]);
        $this->hasMany('CharacterVersions', [
            'foreignKey' => 'universe_id'
        ]);
        $this->hasMany('Characters', [
            'foreignKey' => 'universe_id'
        ]);
        $this->hasMany('MapChangeVersions', [
            'foreignKey' => 'universe_id'
        ]);
        $this->hasMany('MapChanges', [
            'foreignKey' => 'universe_id'
        ]);
        $this->hasMany('MapVersions', [
            'foreignKey' => 'universe_id'
        ]);
        $this->hasMany('Maps', [
            'foreignKey' => 'universe_id'
        ]);
        $this->hasMany('Media', [
            'foreignKey' => 'universe_id'
        ]);
        $this->hasMany('MediaVersions', [
            'foreignKey' => 'universe_id'
        ]);
        $this->hasMany('UniverseVersions', [
            'foreignKey' => 'universe_id'
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
            ->allowEmpty('abbreviation')
            ->allowEmpty('description')
            ->allowEmpty('image')
            ->allowEmpty('link');

        return $validator;
    }
}
