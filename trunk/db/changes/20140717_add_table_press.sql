
Create Table

CREATE TABLE `press` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `corporate_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `newspaper_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advertisers` int(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `additional_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `po_box` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_cedex` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_cedex` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delFlg` int(1) DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `FK_press` (`country`),
  CONSTRAINT `FK_press` FOREIGN KEY (`country`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
