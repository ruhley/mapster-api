<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EventVersionsController;
use Cake\TestSuite\ControllerTestCase;

/**
 * App\Controller\EventVersionsController Test Case
 */
class EventVersionsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.event_version',
		'app.chapter',
		'app.media',
		'app.universe',
		'app.character_version',
		'app.character',
		'app.map_version',
		'app.map',
		'app.place_version',
		'app.place_type',
		'app.place_type_version',
		'app.place',
		'app.media_version',
		'app.universe_version',
		'app.chapter_version',
		'app.event'
	];

}
