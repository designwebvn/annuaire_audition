CREATE TABLE `users_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci



CREATE TABLE `users_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `function` int(11) DEFAULT NULL,
  `phone_contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `login` datetime NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `enable` int(1) NOT NULL DEFAULT '0',
  `observation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_contact_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name_contact_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `function_contact_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_contact_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_contact_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_account` (`function`),
  CONSTRAINT `FK_users_account` FOREIGN KEY (`function`) REFERENCES `users_module` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
