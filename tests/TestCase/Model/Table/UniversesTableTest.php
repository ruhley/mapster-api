<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\UniversesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UniversesTable Test Case
 */
class UniversesTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Universes') ? [] : ['className' => 'App\Model\Table\UniversesTable'];
		$this->Universes = TableRegistry::get('Universes', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Universes);

		parent::tearDown();
	}

}
