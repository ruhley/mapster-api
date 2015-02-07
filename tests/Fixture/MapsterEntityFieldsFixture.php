<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MapsterEntityFieldsFixture
 *
 */
class MapsterEntityFieldsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = [
        'mapster_entity_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'mapster_entity_field_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sequence' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'mapster_entity_field_type_id' => ['type' => 'index', 'columns' => ['mapster_entity_field_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['mapster_entity_id', 'mapster_entity_field_type_id'], 'length' => []],
            'mapster_entity_fields_ibfk_1' => ['type' => 'foreign', 'columns' => ['mapster_entity_id'], 'references' => ['mapster_entity_field_types', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'mapster_entity_fields_ibfk_2' => ['type' => 'foreign', 'columns' => ['mapster_entity_field_type_id'], 'references' => ['mapster_entity_field_types', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
'engine' => 'InnoDB', 'collation' => 'utf8_general_ci'
        ],
    ];

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'mapster_entity_id' => 1,
            'mapster_entity_field_type_id' => 1,
            'sequence' => 1
        ],
    ];
}
