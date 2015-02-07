<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MapsterEntitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapsterEntitiesTable Test Case
 */
class MapsterEntitiesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'MapsterEntities' => 'app.mapster_entities',
        'MapsterEntityFields' => 'app.mapster_entity_fields',
        'MapsterEntityFieldTypes' => 'app.mapster_entity_field_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MapsterEntities') ? [] : ['className' => 'App\Model\Table\MapsterEntitiesTable'];
        $this->MapsterEntities = TableRegistry::get('MapsterEntities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MapsterEntities);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
