<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MapsterEntityFieldTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapsterEntityFieldTypesTable Test Case
 */
class MapsterEntityFieldTypesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'MapsterEntityFieldTypes' => 'app.mapster_entity_field_types',
        'MapsterEntityFields' => 'app.mapster_entity_fields',
        'MapsterEntities' => 'app.mapster_entities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MapsterEntityFieldTypes') ? [] : ['className' => 'App\Model\Table\MapsterEntityFieldTypesTable'];
        $this->MapsterEntityFieldTypes = TableRegistry::get('MapsterEntityFieldTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MapsterEntityFieldTypes);

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
