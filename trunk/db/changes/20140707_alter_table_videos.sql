ALTER TABLE `videos`     CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT,     CHANGE `title` `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,     CHANGE `pictures` `pictures` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,     CHANGE `video` `video` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,     CHANGE `grip` `grip` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,     CHANGE `description` `description` TEXT NOT NULL,     CHANGE `type` `type` INT(11) NULL ,     CHANGE `is_home` `is_home` INT(11) NULL ,    ADD PRIMARY KEY(`id`);