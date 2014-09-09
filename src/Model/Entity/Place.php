<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Place Entity.
 */
class Place extends Entity {

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
		'map_id' => true,
		'map' => true,
		'place_versions' => true,
	];

}
