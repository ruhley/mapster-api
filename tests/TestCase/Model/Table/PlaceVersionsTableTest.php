<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\PlaceVersionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlaceVersionsTable Test Case
 */
class PlaceVersionsTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('PlaceVersions') ? [] : ['className' => 'App\Model\Table\PlaceVersionsTable'];
		$this->PlaceVersions = TableRegistry::get('PlaceVersions', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlaceVersions);

		parent::tearDown();
	}

}
