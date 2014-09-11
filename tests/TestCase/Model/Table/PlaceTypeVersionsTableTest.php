<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\PlaceTypeVersionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlaceTypeVersionsTable Test Case
 */
class PlaceTypeVersionsTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('PlaceTypeVersions') ? [] : ['className' => 'App\Model\Table\PlaceTypeVersionsTable'];
		$this->PlaceTypeVersions = TableRegistry::get('PlaceTypeVersions', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlaceTypeVersions);

		parent::tearDown();
	}

}
