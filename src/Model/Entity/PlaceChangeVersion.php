<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlaceChangeVersion Entity.
 */
class PlaceChangeVersion extends Entity
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
        'place_type_id' => true,
        'coordinates' => true,
        'map_id' => true,
        'place_id' => true,
        'event_id' => true,
        'place_change_id' => true,
        'place_type' => true,
        'map' => true,
        'place' => true,
        'event' => true,
        'place_change' => true,
    ];
}
