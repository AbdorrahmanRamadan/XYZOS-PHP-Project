CREATE DATABASE IF NOT EXISTS xyzos42;

use xyzos42;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `products` (
  `Product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `orders` (
  `Order_id` int(11) NOT NULL AUTO_INCREMENT,
  `Order_date` date NOT NULL DEFAULT current_timestamp(),
  `Download_count` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Order_id`),
  FOREIGN KEY (`user_id`) REFERENCES users (`id`),
  FOREIGN KEY (`product_id`) REFERENCES products (`Product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tokens` (
  `ID` int(11) NOT NULL,
  `remember_me_token` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`,`remember_me_token`),
  FOREIGN KEY (`ID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO products values(1,'XYZOS.zip');