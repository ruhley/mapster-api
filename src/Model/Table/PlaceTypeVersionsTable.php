<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlaceTypeVersions Model
 */
class PlaceTypeVersionsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('place_type_versions');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('PlaceTypes', [
			'foreignKey' => 'place_type_id',
		]);
	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create')
			->validatePresence('name', 'create')
			->notEmpty('name')
			->allowEmpty('description')
			->allowEmpty('image')
			->allowEmpty('link')
			->add('place_type_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('place_type_id', 'create')
			->notEmpty('place_type_id');

		return $validator;
	}

}
