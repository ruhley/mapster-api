<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ChapterVersion Entity.
 */
class ChapterVersion extends Entity {

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
		'media_id' => true,
		'chapter_id' => true,
		'media' => true,
		'chapter' => true,
	];

}
