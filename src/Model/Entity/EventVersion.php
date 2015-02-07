<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventVersion Entity.
 */
class EventVersion extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'link' => true,
        'sequence' => true,
        'chapter_id' => true,
        'event_id' => true,
        'chapter' => true,
        'event' => true,
    ];
}
