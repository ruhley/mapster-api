<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\MapsterEntityFieldTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapsterEntityFieldTypesTable Test Case
 */
class MapsterEntityFieldTypesTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('MapsterEntityFieldTypes') ? [] : ['className' => 'App\Model\Table\MapsterEntityFieldTypesTable'];
		$this->MapsterEntityFieldTypes = TableRegistry::get('MapsterEntityFieldTypes', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapsterEntityFieldTypes);

		parent::tearDown();
	}

}
