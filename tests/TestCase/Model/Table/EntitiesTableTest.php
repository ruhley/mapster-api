<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\EntitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EntitiesTable Test Case
 */
class EntitiesTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.entity',
		'app.entity_field',
		'app.entity_field_type'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Entities') ? [] : ['className' => 'App\Model\Table\EntitiesTable'];
		$this->Entities = TableRegistry::get('Entities', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Entities);

		parent::tearDown();
	}

}
