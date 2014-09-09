<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\PlacesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlacesTable Test Case
 */
class PlacesTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Places') ? [] : ['className' => 'App\Model\Table\PlacesTable'];
		$this->Places = TableRegistry::get('Places', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Places);

		parent::tearDown();
	}

}
