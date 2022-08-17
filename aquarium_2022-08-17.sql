# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.34)
# Database: aquarium
# Generation Time: 2022-08-17 11:10:00 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table galeri
# ------------------------------------------------------------

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;

INSERT INTO `galeri` (`id`, `gambar`, `created_at`, `updated_at`)
VALUES
	(2,'23-07-2022-9275baju.png','2022-07-23 13:47:36','2022-07-23 13:47:36'),
	(3,'23-07-2022-8967WhatsApp Image 2022-07-14 at 6.31.29 PM.jpeg','2022-07-23 13:48:24','2022-07-23 13:48:24');

/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table home
# ------------------------------------------------------------

DROP TABLE IF EXISTS `home`;

CREATE TABLE `home` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `suhu` int(255) DEFAULT NULL,
  `tinggi_air` int(255) DEFAULT NULL,
  `kipas` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `home` WRITE;
/*!40000 ALTER TABLE `home` DISABLE KEYS */;

INSERT INTO `home` (`id`, `suhu`, `tinggi_air`, `kipas`, `created_at`, `updated_at`)
VALUES
	(1,26,71,0,NULL,NULL);

/*!40000 ALTER TABLE `home` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kipas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kipas`;

CREATE TABLE `kipas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `value` int(11) DEFAULT NULL COMMENT '0:mati, 1:hidup',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table lampu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lampu`;

CREATE TABLE `lampu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `light1_start` time DEFAULT NULL,
  `light1_end` time DEFAULT NULL,
  `light2_start` time DEFAULT NULL,
  `light2_end` time DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `lampu` WRITE;
/*!40000 ALTER TABLE `lampu` DISABLE KEYS */;

INSERT INTO `lampu` (`id`, `light1_start`, `light1_end`, `light2_start`, `light2_end`, `active`, `created_at`, `updated_at`)
VALUES
	(2,'19:18:00','22:18:00','01:18:00','18:38:00',0,'2022-07-23 13:18:09','2022-07-24 18:51:38'),
	(3,'19:46:00','19:51:00','21:51:00','22:51:00',1,'2022-07-24 18:51:26','2022-07-24 18:53:21');

/*!40000 ALTER TABLE `lampu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pakan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pakan`;

CREATE TABLE `pakan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `food1` time DEFAULT NULL,
  `food2` time DEFAULT NULL,
  `food3` time DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pakan` WRITE;
/*!40000 ALTER TABLE `pakan` DISABLE KEYS */;

INSERT INTO `pakan` (`id`, `food1`, `food2`, `food3`, `active`, `created_at`, `updated_at`)
VALUES
	(2,'22:31:00','02:31:00','16:31:00',1,'2022-07-23 13:30:20','2022-07-23 13:32:34'),
	(3,'18:51:00','20:51:00','22:51:00',NULL,'2022-07-24 18:51:57','2022-07-24 18:51:57');

/*!40000 ALTER TABLE `pakan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_users`;

CREATE TABLE `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`) USING BTREE,
  KEY `role_users_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

LOCK TABLES `role_users` WRITE;
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;

INSERT INTO `role_users` (`user_id`, `role_id`)
VALUES
	(1,1);

/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'superadmin','2020-12-23 23:17:35','2020-12-23 23:17:35');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table suhu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `suhu`;

CREATE TABLE `suhu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tentang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tentang`;

CREATE TABLE `tentang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tentang` WRITE;
/*!40000 ALTER TABLE `tentang` DISABLE KEYS */;

INSERT INTO `tentang` (`id`, `gambar`, `nama`, `nim`, `kelas`, `email`, `created_at`, `updated_at`)
VALUES
	(1,'23-07-2022-4333WhatsApp Image 2022-07-14 at 6.31.29 PM.jpeg','safsd','fsgfd','gasfas','sgdfgdfg','2022-07-23 13:56:20','2022-07-23 13:56:20'),
	(2,'23-07-2022-81WhatsApp Image 2022-07-21 at 4.14.46 PM.jpeg','Asi1','4567891','XII1','adi@gmail.com1','2022-07-23 13:59:04','2022-07-23 14:01:24');

/*!40000 ALTER TABLE `tentang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tinggi_air
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tinggi_air`;

CREATE TABLE `tinggi_air` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `telp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `telp`)
VALUES
	(1,'admin',NULL,'admin','2022-07-24 19:08:36','$2y$10$hUhgvzIRqZqMgSrjvIk/5e389Yz/PWaY6G9zzThgS24F/ll3TgXqC','dt2INRcXhciwaxM9xHNb0K40bgOmK3wrPn7qT4YTOlLIXYFv8LRUWq2HslH0','2022-07-24 19:08:36','2022-07-24 19:08:36',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
