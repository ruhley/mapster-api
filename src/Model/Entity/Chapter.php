<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chapter Entity.
 */
class Chapter extends Entity
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
        'sequence' => true,
        'media_id' => true,
        'media' => true,
        'chapter_versions' => true,
        'event_versions' => true,
        'events' => true,
    ];
}
