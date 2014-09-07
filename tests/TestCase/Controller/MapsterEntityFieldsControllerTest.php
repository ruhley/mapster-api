<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MapsterEntityFieldsController;
use Cake\TestSuite\ControllerTestCase;

/**
 * App\Controller\MapsterEntityFieldsController Test Case
 */
class MapsterEntityFieldsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.mapster_entity_field',
		'app.entity',
		'app.entity_field',
		'app.entity_field_type'
	];

}
