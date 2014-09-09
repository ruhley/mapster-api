<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Media Entity.
 */
class Media extends Entity {

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
		'sequence' => true,
		'universe_id' => true,
		'universe' => true,
		'chapter_versions' => true,
		'chapters' => true,
	];

}
