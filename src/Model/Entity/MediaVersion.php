<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MediaVersion Entity.
 */
class MediaVersion extends Entity {

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
		'media_id' => true,
		'universe' => true,
		'media' => true,
	];

}
