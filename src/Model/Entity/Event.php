<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity.
 */
class Event extends Entity {

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
		'map' => true,
		'chapter' => true,
		'event_versions' => true,
	];

}
