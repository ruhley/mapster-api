<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PlaceVersionsController;
use Cake\TestSuite\ControllerTestCase;

/**
 * App\Controller\PlaceVersionsController Test Case
 */
class PlaceVersionsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.place_version',
		'app.map',
		'app.universe',
		'app.media',
		'app.chapter_version',
		'app.chapter',
		'app.media_version',
		'app.universe_version',
		'app.map_version',
		'app.place'
	];

}
