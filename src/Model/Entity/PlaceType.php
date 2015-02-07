<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlaceType Entity.
 */
class PlaceType extends Entity
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
        'place_changes' => true,
        'place_type_versions' => true,
        'place_versions' => true,
        'places' => true,
    ];
}
