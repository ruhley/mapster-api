<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\MediaVersionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MediaVersionsTable Test Case
 */
class MediaVersionsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.media_version',
		'app.universe',
		'app.media',
		'app.chapter_version',
		'app.chapter',
		'app.universe_version'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('MediaVersions') ? [] : ['className' => 'App\Model\Table\MediaVersionsTable'];
		$this->MediaVersions = TableRegistry::get('MediaVersions', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MediaVersions);

		parent::tearDown();
	}

}
