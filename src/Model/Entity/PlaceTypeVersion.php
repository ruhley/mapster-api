<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlaceTypeVersion Entity.
 */
class PlaceTypeVersion extends Entity
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
        'place_type' => true,
    ];
}
