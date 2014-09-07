<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\MapsterEntitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapsterEntitiesTable Test Case
 */
class MapsterEntitiesTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('MapsterEntities') ? [] : ['className' => 'App\Model\Table\MapsterEntitiesTable'];
		$this->MapsterEntities = TableRegistry::get('MapsterEntities', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapsterEntities);

		parent::tearDown();
	}

}
