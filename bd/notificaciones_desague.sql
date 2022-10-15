/*
 Navicat Premium Data Transfer

 Source Server         : cert
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : fleet-master

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 14/10/2022 20:23:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for notificaciones_desague
-- ----------------------------
DROP TABLE IF EXISTS `notificaciones_desague`;
CREATE TABLE `notificaciones_desague`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_tracker` int(10) NULL DEFAULT NULL,
  `registro` decimal(11, 2) NULL DEFAULT NULL,
  `fch_registro` date NULL DEFAULT NULL,
  `hra_registro` time(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
