<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CharacterVersion Entity.
 */
class CharacterVersion extends Entity {

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
		'universe_id' => true,
		'character_id' => true,
		'universe' => true,
		'character' => true,
	];

}
