/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : aquarium

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 23/07/2022 22:05:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for galeri
-- ----------------------------
DROP TABLE IF EXISTS `galeri`;
CREATE TABLE `galeri`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of galeri
-- ----------------------------
INSERT INTO `galeri` VALUES (2, '23-07-2022-9275baju.png', '2022-07-23 13:47:36', '2022-07-23 13:47:36');
INSERT INTO `galeri` VALUES (3, '23-07-2022-8967WhatsApp Image 2022-07-14 at 6.31.29 PM.jpeg', '2022-07-23 13:48:24', '2022-07-23 13:48:24');

-- ----------------------------
-- Table structure for home
-- ----------------------------
DROP TABLE IF EXISTS `home`;
CREATE TABLE `home`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `suhu` int(255) NULL DEFAULT NULL,
  `tinggi_air` int(255) NULL DEFAULT NULL,
  `kipas` int(255) NULL DEFAULT NULL,
  `lampu` int(255) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of home
-- ----------------------------

-- ----------------------------
-- Table structure for lampu
-- ----------------------------
DROP TABLE IF EXISTS `lampu`;
CREATE TABLE `lampu`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `light1_start` time NULL DEFAULT NULL,
  `light1_end` time NULL DEFAULT NULL,
  `light2_start` time NULL DEFAULT NULL,
  `light2_end` time NULL DEFAULT NULL,
  `active` int(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lampu
-- ----------------------------
INSERT INTO `lampu` VALUES (2, '21:18:00', '22:18:00', '01:18:00', '02:18:00', 1, '2022-07-23 13:18:09', '2022-07-23 13:21:42');

-- ----------------------------
-- Table structure for pakan
-- ----------------------------
DROP TABLE IF EXISTS `pakan`;
CREATE TABLE `pakan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food1` time NULL DEFAULT NULL,
  `food2` time NULL DEFAULT NULL,
  `food3` time NULL DEFAULT NULL,
  `active` int(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pakan
-- ----------------------------
INSERT INTO `pakan` VALUES (2, '22:31:00', '02:31:00', '16:31:00', 1, '2022-07-23 13:30:20', '2022-07-23 13:32:34');

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  UNIQUE INDEX `role_users_user_id_role_id_unique`(`user_id`, `role_id`) USING BTREE,
  INDEX `role_users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
INSERT INTO `role_users` VALUES (1, 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');

-- ----------------------------
-- Table structure for tentang
-- ----------------------------
DROP TABLE IF EXISTS `tentang`;
CREATE TABLE `tentang`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nim` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tentang
-- ----------------------------
INSERT INTO `tentang` VALUES (1, '23-07-2022-4333WhatsApp Image 2022-07-14 at 6.31.29 PM.jpeg', 'safsd', 'fsgfd', 'gasfas', 'sgdfgdfg', '2022-07-23 13:56:20', '2022-07-23 13:56:20');
INSERT INTO `tentang` VALUES (2, '23-07-2022-81WhatsApp Image 2022-07-21 at 4.14.46 PM.jpeg', 'Asi1', '4567891', 'XII1', 'adi@gmail.com1', '2022-07-23 13:59:04', '2022-07-23 14:01:24');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', NULL, 'admin', '2022-07-23 22:03:37', '$2y$10$hUhgvzIRqZqMgSrjvIk/5e389Yz/PWaY6G9zzThgS24F/ll3TgXqC', 'uJGCnu3N7sOGFu1231UtXNGTCbjLmwulIOfqQ5iEV7SShfSuNZuk8iVRYPaH', '2022-07-23 22:03:37', '2022-07-23 22:03:37', NULL);

SET FOREIGN_KEY_CHECKS = 1;
