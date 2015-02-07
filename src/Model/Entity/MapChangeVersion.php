<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MapChangeVersion Entity.
 */
class MapChangeVersion extends Entity
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
        'map_change_id' => true,
        'universe' => true,
        'map' => true,
        'event' => true,
        'map_change' => true,
    ];
}
