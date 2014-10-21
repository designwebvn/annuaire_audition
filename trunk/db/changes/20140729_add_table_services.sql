CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cochlear_implant` int(1) DEFAULT '1',
  `title_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_1` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_3` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ranking` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
