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
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.place_version',
		'app.map',
		'app.universe',
		'app.media',
		'app.chapter_version',
		'app.chapter',
		'app.media_version',
		'app.universe_version',
		'app.map_version',
		'app.place',
		'app.place_type'
	];

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
