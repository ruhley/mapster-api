<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Universe Entity.
 */
class Universe extends Entity {

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
		'media' => true,
		'media_versions' => true,
		'universe_versions' => true,
	];

}
