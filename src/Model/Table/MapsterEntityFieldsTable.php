<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MapsterEntityFields Model
 */
class MapsterEntityFieldsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('mapster_entity_fields');
        $this->displayField('mapster_entity_id');
        $this->primaryKey(['mapster_entity_id', 'mapster_entity_field_type_id']);
        $this->belongsTo('MapsterEntities', [
            'foreignKey' => 'mapster_entity_id'
        ]);
        $this->belongsTo('MapsterEntityFieldTypes', [
            'foreignKey' => 'mapster_entity_field_type_id'
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
            ->add('mapster_entity_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('mapster_entity_id', 'create')
            ->add('mapster_entity_field_type_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('mapster_entity_field_type_id', 'create')
            ->add('sequence', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('sequence');

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
        $rules->add($rules->existsIn(['mapster_entity_id'], 'MapsterEntities'));
        $rules->add($rules->existsIn(['mapster_entity_field_type_id'], 'MapsterEntityFieldTypes'));
        return $rules;
    }
}
