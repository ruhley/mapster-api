<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MapChange Entity.
 */
class MapChange extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'image' => true,
        'link' => true,
        'universe_id' => true,
        'map_id' => true,
        'event_id' => true,
        'universe' => true,
        'map' => true,
        'event' => true,
    ];
}
