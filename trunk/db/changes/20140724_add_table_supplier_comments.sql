CREATE TABLE `supplier_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `is_active` int(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_supplier_comments` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci


CREATE TABLE `supplier_pdf` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` INT(11) DEFAULT NULL,
  `list_file` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` DATETIME DEFAULT NULL,
  `updated` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
