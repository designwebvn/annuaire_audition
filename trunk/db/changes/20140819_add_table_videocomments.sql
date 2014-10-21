CREATE TABLE `video_comments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `video_id` INT(11) DEFAULT NULL,
  `parent_id` INT(11) NOT NULL DEFAULT '0',
  `subject` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` TEXT COLLATE utf8_unicode_ci,
  `is_active` INT(1) DEFAULT '0',
  `created` DATETIME DEFAULT NULL,
  `updated` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci