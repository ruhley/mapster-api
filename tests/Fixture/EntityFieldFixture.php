<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EntityFieldFixture
 *
 */
class EntityFieldFixture extends TestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = [
		'entity_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'entity_field_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'sequence' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'_indexes' => [
			'entity_field_type_id' => ['type' => 'index', 'columns' => ['entity_field_type_id'], 'length' => []],
		],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['entity_id', 'entity_field_type_id'], 'length' => []],
			'entity_fields_ibfk_1' => ['type' => 'foreign', 'columns' => ['entity_field_type_id'], 'references' => ['entity_field_types', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
			'entity_fields_ibfk_2' => ['type' => 'foreign', 'columns' => ['entity_id'], 'references' => ['entities', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
		],
		'_options' => [
'engine' => 'InnoDB', 'collation' => 'utf8_general_ci'
		],
	];

/**
 * Records
 *
 * @var array
 */
	public $records = [
		[
			'entity_id' => 1,
			'entity_field_type_id' => 1,
			'sequence' => 1
		],
	];

}
