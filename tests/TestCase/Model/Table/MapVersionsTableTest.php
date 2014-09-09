<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\MapVersionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapVersionsTable Test Case
 */
class MapVersionsTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('MapVersions') ? [] : ['className' => 'App\Model\Table\MapVersionsTable'];
		$this->MapVersions = TableRegistry::get('MapVersions', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapVersions);

		parent::tearDown();
	}

}
