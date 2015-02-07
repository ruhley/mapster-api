<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UniverseChange Entity.
 */
class UniverseChange extends Entity
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
        'universe_id' => true,
        'event_id' => true,
        'universe' => true,
        'event' => true,
    ];
}
