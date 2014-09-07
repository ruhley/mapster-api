<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chapters Model
 */
class ChaptersTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('chapters');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Media', [
			'foreignKey' => 'media_id',
		]);
		$this->hasMany('ChapterVersions', [
			'foreignKey' => 'chapter_id',
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
			->add('media_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('media_id', 'create')
			->notEmpty('media_id');

		return $validator;
	}

}
