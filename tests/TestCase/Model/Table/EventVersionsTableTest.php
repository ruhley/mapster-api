<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\EventVersionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventVersionsTable Test Case
 */
class EventVersionsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.event_version',
		'app.map',
		'app.universe',
		'app.character_version',
		'app.character',
		'app.map_version',
		'app.media',
		'app.chapter_version',
		'app.chapter',
		'app.media_version',
		'app.universe_version',
		'app.place_version',
		'app.place_type',
		'app.place_type_version',
		'app.place',
		'app.event'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('EventVersions') ? [] : ['className' => 'App\Model\Table\EventVersionsTable'];
		$this->EventVersions = TableRegistry::get('EventVersions', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventVersions);

		parent::tearDown();
	}

}
