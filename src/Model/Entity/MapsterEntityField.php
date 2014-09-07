<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MapsterEntityField Entity.
 */
class MapsterEntityField extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'sequence' => true,
		'mapster_entity' => true,
		'mapster_entity_field_type' => true,
	];

}
