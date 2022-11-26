CREATE DATABASE  IF NOT EXISTS `bd-made-by-me`;
USE `bd-made-by-me`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(45) NOT NULL,
    `lastname` varchar(45) NOT NULL,
    `cpf` int(11) NOT NULL,
    `email` varchar(45) NOT NULL,
    `password` varchar(255) NOT NULL,
    `photo` varchar(255) DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO `users` VALUES
    (1,'Kaiky','Cancherini','05369620067','kaikyfillipo@gmail.com','kaiky123','foto...','2022-09-08 16:34:59',NULL),
    (2,'Miguel','Medeiros','032042234254','miguelmedeiros@gmail.com','miguel123','foto...','2022-10-23 18:22:07',NULL);

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idUser` int(11) NOT NULL,
    `street` varchar(45) NOT NULL,
    `number` varchar(45) NOT NULL,
    `complement` varchar(45) NOT NULL,
    `city` varchar(45) NOT NULL,
    `state` varchar(45) NOT NULL,
    `zipCode` varchar(45) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `udated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `fk_addresses_users_idx` (`idUser`),
    CONSTRAINT `fk_addresses_users` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idSeller` int(11) NOT NULL,
    `title` varchar(255) NOT NULL,
    `price` varchar(255) NOT NULL,
    `category` varchar(255) NOT NULL,
    `description` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `itemsPhotos`;
CREATE TABLE `itemsPhotos` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idItem` int(11) NOT NULL,
    `photo` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_itemsPhotos_items_idx` (`idItem`),
    CONSTRAINT `fk_itemsPhotos_items` FOREIGN KEY (`idItem`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `question` text NOT NULL,
    `answer` text NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `faqs` VALUES 
    (1,'Como submeter um projeto?','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2022-09-08 16:34:59',NULL),
    (2,'Como fazer o cadastro?','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2022-09-08 16:34:59',NULL),
    (3,'Quais os dias do evento?','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2022-09-08 16:34:59',NULL),
    (4,'Com são realizadas as avaliações','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2022-09-08 16:34:59',NULL);

UNLOCK TABLES;
