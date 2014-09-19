<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\CharacterVersionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CharacterVersionsTable Test Case
 */
class CharacterVersionsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.character_version',
		'app.universe',
		'app.media',
		'app.chapter_version',
		'app.chapter',
		'app.media_version',
		'app.universe_version',
		'app.character'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('CharacterVersions') ? [] : ['className' => 'App\Model\Table\CharacterVersionsTable'];
		$this->CharacterVersions = TableRegistry::get('CharacterVersions', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CharacterVersions);

		parent::tearDown();
	}

}
