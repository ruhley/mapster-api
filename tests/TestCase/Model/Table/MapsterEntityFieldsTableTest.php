<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\MapsterEntityFieldsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapsterEntityFieldsTable Test Case
 */
class MapsterEntityFieldsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.mapster_entity_field',
		'app.mapster_entity',
		'app.mapster_entity_field_type'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('MapsterEntityFields') ? [] : ['className' => 'App\Model\Table\MapsterEntityFieldsTable'];
		$this->MapsterEntityFields = TableRegistry::get('MapsterEntityFields', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapsterEntityFields);

		parent::tearDown();
	}

}
