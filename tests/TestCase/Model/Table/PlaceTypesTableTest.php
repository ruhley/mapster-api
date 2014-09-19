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
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.place_type',
		'app.place_type_version',
		'app.place_version',
		'app.map',
		'app.universe',
		'app.media',
		'app.chapter_version',
		'app.chapter',
		'app.media_version',
		'app.universe_version',
		'app.map_version',
		'app.place'
	];

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
