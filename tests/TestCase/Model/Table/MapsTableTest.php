<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\MapsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapsTable Test Case
 */
class MapsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.map',
		'app.universe',
		'app.media',
		'app.chapter_version',
		'app.chapter',
		'app.media_version',
		'app.universe_version',
		'app.map_version'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Maps') ? [] : ['className' => 'App\Model\Table\MapsTable'];
		$this->Maps = TableRegistry::get('Maps', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Maps);

		parent::tearDown();
	}

}
