CREATE TABLE `products` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `description` text COLLATE utf8_unicode_ci NOT NULL,
 `price` float(10,2) NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `customers` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `orders` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `customer_id` int(11) NOT NULL,
 `grand_total` float(10,2) NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
 PRIMARY KEY (`id`),
 KEY `customer_id` (`customer_id`),
 CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `order_items` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `order_id` int(11) NOT NULL,
 `product_id` int(11) NOT NULL,
 `quantity` int(5) NOT NULL,
 `sub_total` float(10,2) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `order_id` (`order_id`),
 CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;