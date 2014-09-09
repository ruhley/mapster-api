<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\ChapterVersionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChapterVersionsTable Test Case
 */
class ChapterVersionsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.chapter_version',
		'app.media',
		'app.universe',
		'app.media_version',
		'app.universe_version',
		'app.chapter'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('ChapterVersions') ? [] : ['className' => 'App\Model\Table\ChapterVersionsTable'];
		$this->ChapterVersions = TableRegistry::get('ChapterVersions', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChapterVersions);

		parent::tearDown();
	}

}
