<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ChaptersController;
use Cake\TestSuite\ControllerTestCase;

/**
 * App\Controller\ChaptersController Test Case
 */
class ChaptersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.chapter',
		'app.media',
		'app.universe',
		'app.universe_version',
		'app.chapter_version'
	];

}
