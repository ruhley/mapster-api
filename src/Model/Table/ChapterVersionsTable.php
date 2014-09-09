<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChapterVersions Model
 */
class ChapterVersionsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('chapter_versions');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Media', [
			'foreignKey' => 'media_id',
		]);
		$this->belongsTo('Chapters', [
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
			->allowEmpty('description')
			->allowEmpty('image')
			->allowEmpty('link')
			->add('sequence', 'valid', ['rule' => 'numeric'])
			->allowEmpty('sequence')
			->add('media_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('media_id', 'create')
			->notEmpty('media_id')
			->add('chapter_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('chapter_id', 'create')
			->notEmpty('chapter_id');

		return $validator;
	}

}
