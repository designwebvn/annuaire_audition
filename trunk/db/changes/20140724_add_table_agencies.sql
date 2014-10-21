CREATE TABLE `agencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `corporate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `corporate_name_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `legal_status` int(1) DEFAULT '0',
  `advertisers` int(1) NOT NULL DEFAULT '0',
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_id` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `additional_address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(11) NOT NULL,
  `zip` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `po_box` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_cedex` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_cedex` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email_1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_3` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grip` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publishing` int(1) DEFAULT '0',
  `website` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_2` int(11) DEFAULT NULL,
  `po_box_cedex_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_cedex_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci