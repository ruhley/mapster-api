<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MapVersionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapVersionsTable Test Case
 */
class MapVersionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'MapVersions' => 'app.map_versions',
        'Universes' => 'app.universes',
        'CharacterChanges' => 'app.character_changes',
        'Characters' => 'app.characters',
        'CharacterVersions' => 'app.character_versions',
        'Events' => 'app.events',
        'Chapters' => 'app.chapters',
        'Media' => 'app.media',
        'ChapterVersions' => 'app.chapter_versions',
        'EventVersions' => 'app.event_versions',
        'MapChanges' => 'app.map_changes',
        'Maps' => 'app.maps',
        'PlaceChanges' => 'app.place_changes',
        'PlaceTypes' => 'app.place_types',
        'PlaceTypeVersions' => 'app.place_type_versions',
        'PlaceVersions' => 'app.place_versions',
        'Places' => 'app.places',
        'UniverseChanges' => 'app.universe_changes',
        'MediaVersions' => 'app.media_versions',
        'UniverseVersions' => 'app.universe_versions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MapVersions') ? [] : ['className' => 'App\Model\Table\MapVersionsTable'];
        $this->MapVersions = TableRegistry::get('MapVersions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MapVersions);

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
