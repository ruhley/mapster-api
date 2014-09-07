<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\EntityFieldsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EntityFieldsTable Test Case
 */
class EntityFieldsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.entity_field',
		'app.entity',
		'app.entity_field_type'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('EntityFields') ? [] : ['className' => 'App\Model\Table\EntityFieldsTable'];
		$this->EntityFields = TableRegistry::get('EntityFields', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntityFields);

		parent::tearDown();
	}

}
