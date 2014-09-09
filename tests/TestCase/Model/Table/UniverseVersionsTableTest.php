<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\UniverseVersionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UniverseVersionsTable Test Case
 */
class UniverseVersionsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.universe_version',
		'app.universe',
		'app.media',
		'app.chapter_version',
		'app.chapter',
		'app.media_version'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('UniverseVersions') ? [] : ['className' => 'App\Model\Table\UniverseVersionsTable'];
		$this->UniverseVersions = TableRegistry::get('UniverseVersions', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UniverseVersions);

		parent::tearDown();
	}

}
