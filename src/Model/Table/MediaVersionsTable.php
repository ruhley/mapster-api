<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MediaVersions Model
 */
class MediaVersionsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('media_versions');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Universes', [
			'foreignKey' => 'universe_id',
		]);
		$this->belongsTo('Media', [
			'foreignKey' => 'media_id',
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
			->allowEmpty('abbreviation')
			->allowEmpty('description')
			->allowEmpty('image')
			->allowEmpty('link')
			->add('universe_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('universe_id', 'create')
			->notEmpty('universe_id')
			->add('media_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('media_id', 'create')
			->notEmpty('media_id');

		return $validator;
	}

}
