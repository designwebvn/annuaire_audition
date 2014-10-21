ALTER TABLE `products` DROP COLUMN `alias`, DROP COLUMN `meta_product`, DROP COLUMN `title_product`, DROP COLUMN `best_seller`, DROP COLUMN `value`, DROP COLUMN `units`, DROP COLUMN `description_shipping_fee`, DROP COLUMN `quantity`, DROP COLUMN `shipping_immediately`, DROP COLUMN `availble_pickup`, DROP COLUMN `availble_ship`, DROP COLUMN `type_shipping`, DROP COLUMN `discount_percent`, DROP COLUMN `is_special`, DROP COLUMN `tag`, DROP COLUMN `label_id`, DROP COLUMN `end_time`, DROP COLUMN `start_time`, DROP COLUMN `ordered_count`, DROP COLUMN `video`, DROP COLUMN `sell_qty`, DROP COLUMN `sell_amount`, DROP COLUMN `is_active`, DROP COLUMN `producer_id`, DROP COLUMN `shipping_cost`, DROP COLUMN `short_desciption`, DROP COLUMN `user_id`, DROP COLUMN `description`, DROP COLUMN `direct_buy_price`, DROP COLUMN `price_purchase`, DROP COLUMN `price`, DROP COLUMN `generic_name`, DROP COLUMN `image`,    ADD COLUMN `slug` VARCHAR(255) NOT NULL AFTER `name`,     ADD COLUMN `type` VARCHAR(255) NOT NULL AFTER `slug`,     ADD COLUMN `image` VARCHAR(255) NULL AFTER `type`,     ADD COLUMN `pdf` VARCHAR(255) NULL AFTER `image`,     ADD COLUMN `grip` VARCHAR(255) NOT NULL AFTER `pdf`,     ADD COLUMN `oder_product_id` INT(11) NULL AFTER `grip`,     ADD COLUMN `description` TEXT NOT NULL AFTER `oder_product_id`,     ADD COLUMN `is_home` INT(11) NULL AFTER `description`,    CHANGE `name` `name` VARCHAR(255) NOT NULL;