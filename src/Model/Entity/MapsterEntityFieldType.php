<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MapsterEntityFieldType Entity.
 */
class MapsterEntityFieldType extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'name' => true,
		'mapster_entity_fields' => true,
	];

}
