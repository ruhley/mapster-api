<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\ChaptersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChaptersTable Test Case
 */
class ChaptersTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.chapter',
		'app.media',
		'app.universe',
		'app.media_version',
		'app.universe_version',
		'app.chapter_version'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Chapters') ? [] : ['className' => 'App\Model\Table\ChaptersTable'];
		$this->Chapters = TableRegistry::get('Chapters', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Chapters);

		parent::tearDown();
	}

}
