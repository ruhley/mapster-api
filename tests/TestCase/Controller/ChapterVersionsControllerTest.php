<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ChapterVersionsController;
use Cake\TestSuite\ControllerTestCase;

/**
 * App\Controller\ChapterVersionsController Test Case
 */
class ChapterVersionsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.chapter_version',
		'app.media',
		'app.universe',
		'app.universe_version',
		'app.chapter'
	];

}
