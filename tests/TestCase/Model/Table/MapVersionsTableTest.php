<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\MapVersionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapVersionsTable Test Case
 */
class MapVersionsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.map_version',
		'app.universe',
		'app.media',
		'app.chapter_version',
		'app.chapter',
		'app.media_version',
		'app.universe_version',
		'app.map'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('MapVersions') ? [] : ['className' => 'App\Model\Table\MapVersionsTable'];
		$this->MapVersions = TableRegistry::get('MapVersions', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapVersions);

		parent::tearDown();
	}

}
