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
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.place_type_version',
		'app.place_type',
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
