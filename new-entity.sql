CREATE TABLE `places` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `image` TEXT,
  `link` TEXT,
  `map_id` INT(11) NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT FOREIGN KEY (`map_id`) REFERENCES `maps` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `place_versions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `image` TEXT,
  `link` TEXT,
  `map_id` INT(11) NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `place_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT FOREIGN KEY (`map_id`) REFERENCES `maps` (`id`),
  CONSTRAINT FOREIGN KEY (`place_id`) REFERENCES `places` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO mapster_entities (NAME, plural) VALUES ('Place', 'Places');

INSERT INTO mapster_entity_fields (mapster_entity_id, mapster_entity_field_type_id, sequence) VALUES
((SELECT MAX(id) FROM mapster_entities), 1, 0),
((SELECT MAX(id) FROM mapster_entities), 2, 1),
((SELECT MAX(id) FROM mapster_entities), 3, 2),
((SELECT MAX(id) FROM mapster_entities), 4, 3),
((SELECT MAX(id) FROM mapster_entities), 9, 4);
