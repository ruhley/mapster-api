<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MapsterEntityFieldsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapsterEntityFieldsTable Test Case
 */
class MapsterEntityFieldsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'MapsterEntityFields' => 'app.mapster_entity_fields',
        'MapsterEntities' => 'app.mapster_entities',
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
        $config = TableRegistry::exists('MapsterEntityFields') ? [] : ['className' => 'App\Model\Table\MapsterEntityFieldsTable'];
        $this->MapsterEntityFields = TableRegistry::get('MapsterEntityFields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MapsterEntityFields);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
