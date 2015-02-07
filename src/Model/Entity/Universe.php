<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Universe Entity.
 */
class Universe extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'abbreviation' => true,
        'description' => true,
        'image' => true,
        'link' => true,
        'character_changes' => true,
        'character_versions' => true,
        'characters' => true,
        'map_changes' => true,
        'map_versions' => true,
        'maps' => true,
        'media' => true,
        'media_versions' => true,
        'universe_changes' => true,
        'universe_versions' => true,
    ];
}
