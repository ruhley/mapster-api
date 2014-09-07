<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\EntityFieldTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EntityFieldTypesTable Test Case
 */
class EntityFieldTypesTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.entity_field_type',
		'app.entity_field',
		'app.entity'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('EntityFieldTypes') ? [] : ['className' => 'App\Model\Table\EntityFieldTypesTable'];
		$this->EntityFieldTypes = TableRegistry::get('EntityFieldTypes', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntityFieldTypes);

		parent::tearDown();
	}

}
