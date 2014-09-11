<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\PlaceTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlaceTypesTable Test Case
 */
class PlaceTypesTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('PlaceTypes') ? [] : ['className' => 'App\Model\Table\PlaceTypesTable'];
		$this->PlaceTypes = TableRegistry::get('PlaceTypes', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlaceTypes);

		parent::tearDown();
	}

}
