<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PlacesController;
use Cake\TestSuite\ControllerTestCase;

/**
 * App\Controller\PlacesController Test Case
 */
class PlacesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.place',
		'app.map',
		'app.universe',
		'app.media',
		'app.chapter_version',
		'app.chapter',
		'app.media_version',
		'app.universe_version',
		'app.map_version',
		'app.place_version'
	];

}
