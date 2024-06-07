/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : spk-ahp-new

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 07/06/2024 20:16:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity_log
-- ----------------------------
DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE `activity_log`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject_id` int NULL DEFAULT NULL,
  `subject_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `causer_id` int NULL DEFAULT NULL,
  `causer_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `properties` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `batch_uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `activity_log_log_name_index`(`log_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of activity_log
-- ----------------------------
INSERT INTO `activity_log` VALUES (1, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-06 09:58:09', '2024-06-06 09:58:09', NULL);
INSERT INTO `activity_log` VALUES (2, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-06-06 09:58:33', '2024-06-06 09:58:33', NULL);
INSERT INTO `activity_log` VALUES (3, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 16:16:09', '2024-06-07 16:16:09', NULL);
INSERT INTO `activity_log` VALUES (4, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-06-07 16:16:14', '2024-06-07 16:16:14', NULL);
INSERT INTO `activity_log` VALUES (5, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-06-07 16:16:38', '2024-06-07 16:16:38', NULL);
INSERT INTO `activity_log` VALUES (6, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 16:16:44', '2024-06-07 16:16:44', NULL);
INSERT INTO `activity_log` VALUES (7, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-06-07 16:17:09', '2024-06-07 16:17:09', NULL);
INSERT INTO `activity_log` VALUES (8, 'default', 'ADMIN Menambahkan pertanyaan dengan id = 1 ', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 16:26:18', '2024-06-07 16:26:18', NULL);
INSERT INTO `activity_log` VALUES (9, 'default', 'ADMIN Menambahkan pertanyaan dengan id = 1 ', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 16:26:37', '2024-06-07 16:26:37', NULL);
INSERT INTO `activity_log` VALUES (10, 'default', 'ADMIN Menambahkan pertanyaan dengan id = 1 ', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 16:37:34', '2024-06-07 16:37:34', NULL);
INSERT INTO `activity_log` VALUES (11, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 17:12:32', '2024-06-07 17:12:32', NULL);
INSERT INTO `activity_log` VALUES (12, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 3, 'App\\Models\\User', '[]', '2024-06-07 17:13:07', '2024-06-07 17:13:07', NULL);
INSERT INTO `activity_log` VALUES (13, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 3, 'App\\Models\\User', '[]', '2024-06-07 17:13:43', '2024-06-07 17:13:43', NULL);
INSERT INTO `activity_log` VALUES (14, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 3, 'App\\Models\\User', '[]', '2024-06-07 17:13:49', '2024-06-07 17:13:49', NULL);
INSERT INTO `activity_log` VALUES (15, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 3, 'App\\Models\\User', '[]', '2024-06-07 18:02:38', '2024-06-07 18:02:38', NULL);
INSERT INTO `activity_log` VALUES (16, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 18:02:46', '2024-06-07 18:02:46', NULL);
INSERT INTO `activity_log` VALUES (17, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-06-07 18:53:29', '2024-06-07 18:53:29', NULL);
INSERT INTO `activity_log` VALUES (18, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 18:56:08', '2024-06-07 18:56:08', NULL);
INSERT INTO `activity_log` VALUES (19, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 18:57:47', '2024-06-07 18:57:47', NULL);
INSERT INTO `activity_log` VALUES (20, 'default', 'Menambahkan UserAlbert', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 19:03:56', '2024-06-07 19:03:56', NULL);
INSERT INTO `activity_log` VALUES (21, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 4, 'App\\Models\\User', '[]', '2024-06-07 19:05:06', '2024-06-07 19:05:06', NULL);
INSERT INTO `activity_log` VALUES (22, 'default', 'Menambahkan UserLuther', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 20:03:34', '2024-06-07 20:03:34', NULL);
INSERT INTO `activity_log` VALUES (23, 'default', 'Menambahkan UserDani Ali Cahyadi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 20:13:46', '2024-06-07 20:13:46', NULL);
INSERT INTO `activity_log` VALUES (24, 'default', 'ADMIN Delete User: 6 - ', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 20:14:54', '2024-06-07 20:14:54', NULL);
INSERT INTO `activity_log` VALUES (25, 'default', 'ADMIN Delete User: 4 - ', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 20:15:24', '2024-06-07 20:15:24', NULL);
INSERT INTO `activity_log` VALUES (26, 'default', 'ADMIN Delete User: 5 - ', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-06-07 20:15:40', '2024-06-07 20:15:40', NULL);

-- ----------------------------
-- Table structure for analisis
-- ----------------------------
DROP TABLE IF EXISTS `analisis`;
CREATE TABLE `analisis`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kriteria_id` int NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `perbandingan_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `skala` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kesimpulan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of analisis
-- ----------------------------
INSERT INTO `analisis` VALUES (1, 3, 2, 'p1', '7', NULL, '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `analisis` VALUES (2, 3, 2, 'p2', '7', NULL, '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `analisis` VALUES (3, 3, 2, 'p3', '7', NULL, '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `analisis` VALUES (4, 3, 2, 'p4', '7', NULL, '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `analisis` VALUES (5, 3, 2, 'p5', '7', NULL, '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `analisis` VALUES (6, 3, 2, 'p6', '7', NULL, '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `analisis` VALUES (7, 2, 2, 'p1', '7', NULL, '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `analisis` VALUES (8, 2, 2, 'p2', '7', NULL, '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `analisis` VALUES (9, 2, 2, 'p3', '7', NULL, '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `analisis` VALUES (10, 2, 2, 'p4', '7', NULL, '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `analisis` VALUES (11, 2, 2, 'p5', '7', NULL, '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `analisis` VALUES (12, 2, 2, 'p6', '7', NULL, '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `analisis` VALUES (13, 2, 2, 'p7', '7', NULL, '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `analisis` VALUES (14, 2, 2, 'p8', '7', NULL, '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `analisis` VALUES (15, 2, 2, 'p9', '7', NULL, '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `analisis` VALUES (16, 2, 2, 'p10', '7', NULL, '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `analisis` VALUES (17, 1, 2, 'p1', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (18, 1, 2, 'p2', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (19, 1, 2, 'p3', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (20, 1, 2, 'p4', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (21, 1, 2, 'p5', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (22, 1, 2, 'p6', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (23, 1, 2, 'p7', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (24, 1, 2, 'p8', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (25, 1, 2, 'p9', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (26, 1, 2, 'p10', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (27, 1, 2, 'p11', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (28, 1, 2, 'p12', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (29, 1, 2, 'p13', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (30, 1, 2, 'p14', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (31, 1, 2, 'p15', '7', NULL, '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `analisis` VALUES (32, 3, 3, 'p1', '7', NULL, '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `analisis` VALUES (33, 3, 3, 'p2', '7', NULL, '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `analisis` VALUES (34, 3, 3, 'p3', '7', NULL, '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `analisis` VALUES (35, 3, 3, 'p4', '7', NULL, '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `analisis` VALUES (36, 3, 3, 'p5', '0.14', NULL, '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `analisis` VALUES (37, 3, 3, 'p6', '7', NULL, '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `analisis` VALUES (38, 3, 4, 'p1', '7', NULL, '2024-06-07 19:05:30', '2024-06-07 19:05:30');
INSERT INTO `analisis` VALUES (39, 3, 4, 'p2', '7', NULL, '2024-06-07 19:05:30', '2024-06-07 19:05:30');
INSERT INTO `analisis` VALUES (40, 3, 4, 'p3', '7', NULL, '2024-06-07 19:05:30', '2024-06-07 19:05:30');
INSERT INTO `analisis` VALUES (41, 3, 4, 'p4', '7', NULL, '2024-06-07 19:05:30', '2024-06-07 19:05:30');
INSERT INTO `analisis` VALUES (42, 3, 4, 'p5', '7', NULL, '2024-06-07 19:05:30', '2024-06-07 19:05:30');
INSERT INTO `analisis` VALUES (43, 3, 4, 'p6', '7', NULL, '2024-06-07 19:05:30', '2024-06-07 19:05:30');

-- ----------------------------
-- Table structure for detail
-- ----------------------------
DROP TABLE IF EXISTS `detail`;
CREATE TABLE `detail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `hasil_id` int NULL DEFAULT NULL,
  `perbandingan_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `totalEvn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail
-- ----------------------------
INSERT INTO `detail` VALUES (1, 1, 'C1', '0.63', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `detail` VALUES (2, 1, 'C2', '0.27', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `detail` VALUES (3, 1, 'C3', '0.07', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `detail` VALUES (4, 1, 'C4', '0.02', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `detail` VALUES (5, 2, 'C1', '0.51', '2024-06-07 16:17:29', '2024-06-07 16:17:29');
INSERT INTO `detail` VALUES (6, 2, 'C2', '0.28', '2024-06-07 16:17:29', '2024-06-07 16:17:29');
INSERT INTO `detail` VALUES (7, 2, 'C3', '0.13', '2024-06-07 16:17:29', '2024-06-07 16:17:29');
INSERT INTO `detail` VALUES (8, 2, 'C4', '0.04', '2024-06-07 16:17:29', '2024-06-07 16:17:29');
INSERT INTO `detail` VALUES (9, 2, 'C5', '0.04', '2024-06-07 16:17:29', '2024-06-07 16:17:29');
INSERT INTO `detail` VALUES (10, 3, 'C1', '0.44', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `detail` VALUES (11, 3, 'C2', '0.28', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `detail` VALUES (12, 3, 'C3', '0.16', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `detail` VALUES (13, 3, 'C4', '0.08', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `detail` VALUES (14, 3, 'C5', '0.02', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `detail` VALUES (15, 3, 'C6', '0.01', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `detail` VALUES (16, 4, 'C1', '0.48', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `detail` VALUES (17, 4, 'C2', '0.17', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `detail` VALUES (18, 4, 'C3', '0.17', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `detail` VALUES (19, 4, 'C4', '0.17', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `detail` VALUES (20, 5, 'C1', '0.63', '2024-06-07 19:05:30', '2024-06-07 19:05:30');
INSERT INTO `detail` VALUES (21, 5, 'C2', '0.27', '2024-06-07 19:05:30', '2024-06-07 19:05:30');
INSERT INTO `detail` VALUES (22, 5, 'C3', '0.07', '2024-06-07 19:05:30', '2024-06-07 19:05:30');
INSERT INTO `detail` VALUES (23, 5, 'C4', '0.02', '2024-06-07 19:05:30', '2024-06-07 19:05:30');

-- ----------------------------
-- Table structure for hasil
-- ----------------------------
DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `kriteria_id` int NULL DEFAULT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kesimpulan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hasil
-- ----------------------------
INSERT INTO `hasil` VALUES (1, 2, 3, '12345678', 'Unggul di Kemampuan Menguasai Konsep', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `hasil` VALUES (2, 2, 2, '12345678', 'Unggul di Kemampuan Mendefinisikan Informasi', '2024-06-07 16:17:29', '2024-06-07 16:17:29');
INSERT INTO `hasil` VALUES (3, 2, 1, '12345678', 'Unggul di Kemampuan Belajar dan Adaptasi', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `hasil` VALUES (4, 3, 3, '12345678', 'Unggul di Kemampuan Menguasai Konsep', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `hasil` VALUES (5, 4, 3, NULL, 'Unggul di Kemampuan Menguasai Konsep', '2024-06-07 19:05:30', '2024-06-07 19:05:30');

-- ----------------------------
-- Table structure for jawaban
-- ----------------------------
DROP TABLE IF EXISTS `jawaban`;
CREATE TABLE `jawaban`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `kriteria_id` int NULL DEFAULT NULL,
  `pertanyaan_id` int NULL DEFAULT NULL,
  `perbandingan_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jawaban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 173 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jawaban
-- ----------------------------
INSERT INTO `jawaban` VALUES (1, 2, 3, 101, 'p1', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (2, 2, 3, 102, 'p1', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (3, 2, 3, 103, 'p1', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (4, 2, 3, 104, 'p1', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (5, 2, 3, 105, 'p2', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (6, 2, 3, 106, 'p2', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (7, 2, 3, 107, 'p2', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (8, 2, 3, 108, 'p2', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (9, 2, 3, 109, 'p3', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (10, 2, 3, 110, 'p3', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (11, 2, 3, 111, 'p3', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (12, 2, 3, 112, 'p3', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (13, 2, 3, 113, 'p4', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (14, 2, 3, 114, 'p4', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (15, 2, 3, 115, 'p4', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (16, 2, 3, 116, 'p4', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (17, 2, 3, 117, 'p5', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (18, 2, 3, 118, 'p5', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (19, 2, 3, 119, 'p5', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (20, 2, 3, 120, 'p5', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (21, 2, 3, 121, 'p6', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (22, 2, 3, 122, 'p6', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (23, 2, 3, 123, 'p6', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (24, 2, 3, 124, 'p6', '1', '2024-06-07 16:16:32', '2024-06-07 16:16:32');
INSERT INTO `jawaban` VALUES (25, 2, 2, 61, 'p1', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (26, 2, 2, 62, 'p1', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (27, 2, 2, 63, 'p1', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (28, 2, 2, 64, 'p1', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (29, 2, 2, 65, 'p2', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (30, 2, 2, 66, 'p2', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (31, 2, 2, 67, 'p2', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (32, 2, 2, 68, 'p2', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (33, 2, 2, 69, 'p3', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (34, 2, 2, 70, 'p3', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (35, 2, 2, 71, 'p3', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (36, 2, 2, 72, 'p3', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (37, 2, 2, 73, 'p4', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (38, 2, 2, 74, 'p4', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (39, 2, 2, 75, 'p4', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (40, 2, 2, 76, 'p4', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (41, 2, 2, 77, 'p5', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (42, 2, 2, 78, 'p5', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (43, 2, 2, 79, 'p5', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (44, 2, 2, 80, 'p5', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (45, 2, 2, 81, 'p6', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (46, 2, 2, 82, 'p6', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (47, 2, 2, 83, 'p6', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (48, 2, 2, 84, 'p6', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (49, 2, 2, 85, 'p7', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (50, 2, 2, 86, 'p7', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (51, 2, 2, 87, 'p7', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (52, 2, 2, 88, 'p7', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (53, 2, 2, 89, 'p8', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (54, 2, 2, 90, 'p8', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (55, 2, 2, 91, 'p8', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (56, 2, 2, 92, 'p8', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (57, 2, 2, 93, 'p9', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (58, 2, 2, 94, 'p9', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (59, 2, 2, 95, 'p9', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (60, 2, 2, 96, 'p9', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (61, 2, 2, 97, 'p10', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (62, 2, 2, 98, 'p10', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (63, 2, 2, 99, 'p10', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (64, 2, 2, 100, 'p10', '1', '2024-06-07 16:17:28', '2024-06-07 16:17:28');
INSERT INTO `jawaban` VALUES (65, 2, 1, 1, 'p1', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (66, 2, 1, 2, 'p1', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (67, 2, 1, 3, 'p1', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (68, 2, 1, 4, 'p1', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (69, 2, 1, 5, 'p2', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (70, 2, 1, 6, 'p2', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (71, 2, 1, 7, 'p2', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (72, 2, 1, 8, 'p2', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (73, 2, 1, 9, 'p3', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (74, 2, 1, 10, 'p3', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (75, 2, 1, 11, 'p3', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (76, 2, 1, 12, 'p3', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (77, 2, 1, 13, 'p4', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (78, 2, 1, 14, 'p4', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (79, 2, 1, 15, 'p4', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (80, 2, 1, 16, 'p4', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (81, 2, 1, 17, 'p5', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (82, 2, 1, 18, 'p5', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (83, 2, 1, 19, 'p5', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (84, 2, 1, 20, 'p5', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (85, 2, 1, 21, 'p6', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (86, 2, 1, 22, 'p6', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (87, 2, 1, 23, 'p6', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (88, 2, 1, 24, 'p6', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (89, 2, 1, 25, 'p7', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (90, 2, 1, 26, 'p7', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (91, 2, 1, 27, 'p7', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (92, 2, 1, 28, 'p7', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (93, 2, 1, 29, 'p8', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (94, 2, 1, 30, 'p8', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (95, 2, 1, 31, 'p8', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (96, 2, 1, 32, 'p8', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (97, 2, 1, 33, 'p9', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (98, 2, 1, 34, 'p9', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (99, 2, 1, 35, 'p9', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (100, 2, 1, 36, 'p9', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (101, 2, 1, 37, 'p10', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (102, 2, 1, 38, 'p10', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (103, 2, 1, 39, 'p10', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (104, 2, 1, 40, 'p10', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (105, 2, 1, 41, 'p11', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (106, 2, 1, 42, 'p11', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (107, 2, 1, 43, 'p11', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (108, 2, 1, 44, 'p11', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (109, 2, 1, 45, 'p12', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (110, 2, 1, 46, 'p12', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (111, 2, 1, 47, 'p12', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (112, 2, 1, 48, 'p12', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (113, 2, 1, 49, 'p13', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (114, 2, 1, 50, 'p13', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (115, 2, 1, 51, 'p13', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (116, 2, 1, 52, 'p13', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (117, 2, 1, 53, 'p14', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (118, 2, 1, 54, 'p14', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (119, 2, 1, 55, 'p14', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (120, 2, 1, 56, 'p14', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (121, 2, 1, 57, 'p15', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (122, 2, 1, 58, 'p15', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (123, 2, 1, 59, 'p15', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (124, 2, 1, 60, 'p15', '1', '2024-06-07 16:18:07', '2024-06-07 16:18:07');
INSERT INTO `jawaban` VALUES (125, 3, 3, 101, 'p1', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (126, 3, 3, 102, 'p1', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (127, 3, 3, 103, 'p1', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (128, 3, 3, 104, 'p1', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (129, 3, 3, 105, 'p2', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (130, 3, 3, 106, 'p2', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (131, 3, 3, 107, 'p2', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (132, 3, 3, 108, 'p2', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (133, 3, 3, 109, 'p3', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (134, 3, 3, 110, 'p3', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (135, 3, 3, 111, 'p3', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (136, 3, 3, 112, 'p3', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (137, 3, 3, 113, 'p4', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (138, 3, 3, 114, 'p4', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (139, 3, 3, 115, 'p4', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (140, 3, 3, 116, 'p4', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (141, 3, 3, 117, 'p5', '0', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (142, 3, 3, 118, 'p5', '0', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (143, 3, 3, 119, 'p5', '0', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (144, 3, 3, 120, 'p5', '0', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (145, 3, 3, 121, 'p6', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (146, 3, 3, 122, 'p6', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (147, 3, 3, 123, 'p6', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (148, 3, 3, 124, 'p6', '1', '2024-06-07 17:13:31', '2024-06-07 17:13:31');
INSERT INTO `jawaban` VALUES (149, 4, 3, 101, 'p1', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (150, 4, 3, 102, 'p1', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (151, 4, 3, 103, 'p1', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (152, 4, 3, 104, 'p1', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (153, 4, 3, 105, 'p2', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (154, 4, 3, 106, 'p2', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (155, 4, 3, 107, 'p2', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (156, 4, 3, 108, 'p2', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (157, 4, 3, 109, 'p3', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (158, 4, 3, 110, 'p3', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (159, 4, 3, 111, 'p3', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (160, 4, 3, 112, 'p3', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (161, 4, 3, 113, 'p4', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (162, 4, 3, 114, 'p4', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (163, 4, 3, 115, 'p4', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (164, 4, 3, 116, 'p4', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (165, 4, 3, 117, 'p5', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (166, 4, 3, 118, 'p5', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (167, 4, 3, 119, 'p5', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (168, 4, 3, 120, 'p5', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (169, 4, 3, 121, 'p6', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (170, 4, 3, 122, 'p6', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (171, 4, 3, 123, 'p6', '1', '2024-06-07 19:05:29', '2024-06-07 19:05:29');
INSERT INTO `jawaban` VALUES (172, 4, 3, 124, 'p6', '1', '2024-06-07 19:05:30', '2024-06-07 19:05:30');

-- ----------------------------
-- Table structure for jurusan
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `fakultas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kode_fakultas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jurusan
-- ----------------------------
INSERT INTO `jurusan` VALUES (1, 'Pendidikan Teknik Elektronika', 'Fakultas Teknik', '1', '2024-06-07 19:16:11', '2024-06-07 19:16:11');
INSERT INTO `jurusan` VALUES (2, 'Teknik Elektronika', 'Fakultas Teknik', '1', '2024-06-07 19:16:11', '2024-06-07 19:16:11');
INSERT INTO `jurusan` VALUES (3, 'Pendidikan Teknik Informatika', 'Fakultas Teknik', '1', '2024-06-07 19:16:11', '2024-06-07 19:16:11');
INSERT INTO `jurusan` VALUES (4, 'Animasi', 'Fakultas Teknik', '1', '2024-06-07 19:16:11', '2024-06-07 19:16:11');
INSERT INTO `jurusan` VALUES (5, 'Informatika', 'Fakultas Teknik', '1', '2024-06-07 19:16:11', '2024-06-07 19:16:11');

-- ----------------------------
-- Table structure for master_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `master_kriteria`;
CREATE TABLE `master_kriteria`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kriteria_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_kriteria
-- ----------------------------
INSERT INTO `master_kriteria` VALUES (1, 'Employabilitas Skills', 'Menurut Putriatama (Yutima et al., 2022) Employability skills merupakan keterampilan yang memungkinkan seseorang mendapatkan pekerjaan sesuai dengan kebutuhan', '2024-05-09 23:47:49', '2024-05-09 23:47:49');
INSERT INTO `master_kriteria` VALUES (2, 'Literasi TIK', 'Literasi TIK adalah kemampuan untuk menggunakan teknologi digital, alat komunikasi dan atau jaringan dalam mendefinisikan (define), mengakses (access), mengelola (manage), meingintegrasikan (integrate), mengevaluasi (evaluate), menciptakan (create), dan mengkomunikasikan (communicate) informasi secara baik dan legal dalam membangun masyarakat berpengetahuan (Muhali, 2019)', '2024-05-09 23:47:49', '2024-05-09 23:47:49');
INSERT INTO `master_kriteria` VALUES (3, 'Bahasa Inggris', 'Dalam revolusi industry 4.0 kemampuan bahasa Inggris merupakan alat utama untuk memahami penggunaan teknologi yang menjadi bagian dari dunia industri (Rahmawaty & Milaningrum, 2019)', '2024-05-09 23:47:49', '2024-05-09 23:47:49');

-- ----------------------------
-- Table structure for master_kriteria_sub
-- ----------------------------
DROP TABLE IF EXISTS `master_kriteria_sub`;
CREATE TABLE `master_kriteria_sub`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kriteria_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_kriteria_sub
-- ----------------------------
INSERT INTO `master_kriteria_sub` VALUES (1, '1', 'Kemampuan Belajar dan Adaptasi', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (2, '1', 'Kemampuan Berkomunikasi', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (3, '1', 'Kemampuan Pemecahan Masalah', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (4, '1', 'Keterampilan Teknologi', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (5, '1', 'Keterampilan Berpikir Kreatif', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (6, '1', 'Kemampuan bekerja dalam tim', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (7, '2', 'Kemampuan Mendefinisikan Informasi', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (8, '2', 'Kemampuan Mengakses Informasi', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (9, '2', 'Kemampuan Mengelola Informasi', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (10, '2', 'Kemampuan Mengintegrasikan Informasi', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (11, '2', 'Kemampuan Mengkomunikasikan Informasi', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (12, '3', 'Kemampuan Menguasai Konsep', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (13, '3', 'Kemampuan Menjelaskan Informasi', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (14, '3', 'Kemampuan Menyampaikan Fakta', '2024-05-28 22:25:32', '2024-05-28 22:25:32');
INSERT INTO `master_kriteria_sub` VALUES (15, '3', 'Kemampuan Mengutarakan Ide dan Gagasan', '2024-05-28 22:25:32', '2024-05-28 22:25:32');

-- ----------------------------
-- Table structure for master_kriteria_sub_sub
-- ----------------------------
DROP TABLE IF EXISTS `master_kriteria_sub_sub`;
CREATE TABLE `master_kriteria_sub_sub`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kriteria_sub_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_kriteria_sub_sub
-- ----------------------------
INSERT INTO `master_kriteria_sub_sub` VALUES (1, '1', 'Rasa ingin tahu', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (2, '1', 'Kemampuan penyesuaian', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (3, '1', 'Daya tahan', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (4, '1', 'Evaluasi terus menerus', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (5, '2', 'Kemampuan menyampaikan ide secara jelas', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (6, '2', 'Nyaman berbicara di depan umum', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (7, '2', 'Kemampuan berkomunikasi dalam tim', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (8, '2', 'Dapat membaca dan merespon emosi orang lain', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (9, '3', 'Analisis Masalah', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (10, '3', 'Kreativitas', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (11, '3', 'Implementasi solusi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (12, '3', 'Keberanian mengambil risiko', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (13, '4', 'Penguasaan alat dan perangkat lunak', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (14, '4', 'Kemampuan penyesuaian perkembangan teknologi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (15, '4', 'Literasi data', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (16, '4', 'Penggunaan media sosial profesional', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (17, '5', 'Kefasihan pikiran', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (18, '5', 'Keluwesan pikiran', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (19, '5', 'Keaslian pikiran', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (20, '5', 'Keterincian pikiran', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (21, '6', 'Kemampuan kolaborasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (22, '6', 'Kepemimpinan dalam tim', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (23, '6', 'Keterbukaan terhadap ide lain', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (24, '6', 'Pembagian tugas', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (25, '7', 'Memahami konsep data, informasi, dan pengetahuan', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (26, '7', 'Mampu mengidentifikasi sumber informasi yang berbeda', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (27, '7', 'Memahami struktur informasi dan cara itu disusun', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (28, '7', 'Mampu merumuskan pertanyaan yang relevan untuk memperoleh informasi yang diperlukan', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (29, '8', 'Menggunakan berbagai alat pencarian informasi secara efisien', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (30, '8', 'Evaluasi kredibilitas dan keandalan sumber informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (31, '8', 'Memahami hak cipta dan etika dalam penggunaan informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (32, '8', 'Memahami teknik untuk menavigasi dan menggunakan berbagai platform informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (33, '9', 'Mampu menyusun dan mengelola informasi dengan sistematis', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (34, '9', 'Menggunakan alat dan teknologi untuk mengatur informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (35, '9', 'Memahami konsep metadata dan cara mengelolanya', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (36, '9', 'Mampu membuat dan mengatur backup data untuk menjaga keamanan informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (37, '10', 'Mampu menarik kesimpulan dari informasi yang berbeda', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (38, '10', 'Mengidentifikasi pola dan hubungan antara informasi yang berbeda', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (39, '10', 'Menggabungkan informasi dari berbagai sumber untuk memperoleh pemahaman yang komprehensif', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (40, '10', 'Mampu menggunakan alat analisis untuk mendukung integrasi informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (41, '11', 'Menyusun pesan yang jelas dan mudah dipahami', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (42, '11', 'Memilih media komunikasi yang tepat sesuai dengan konteks dan audiens', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (43, '11', 'Mampu menggambarkan informasi secara visual menggunakan grafik atau diagram', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (44, '11', 'Mampu mengadaptasi gaya komunikasi sesuai dengan kebutuhan dan preferensi audiens', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (45, '12', 'Pemahaman Tata Bahasa', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (46, '12', 'Penguasaan Kosakata', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (47, '12', 'Pengetahuan Tentang Sintaksis', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (48, '12', 'Pemahaman Terhadap Pengucapan', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (49, '13', 'Kemampuan Merangkum', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (50, '13', 'Kemampuan Memberikan Contoh', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (51, '13', 'Kemampuan Menggunakan Ilustrasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (52, '13', 'Kemampuan Menggunakan Analogi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (53, '14', 'Kemampuan Mengorganisir Informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (54, '14', 'Kemampuan Menyajikan Data', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (55, '14', 'Kemampuan Mengutip Sumber', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (56, '14', 'Kemampuan Memilih Informasi Relevan', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (57, '15', 'Kemampuan Berargumen', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (58, '15', 'Kemampuan Berkreasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (59, '15', 'Kemampuan Membangun Narasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub_sub` VALUES (60, '15', 'Kemampuan Memotivasi dan Menginspirasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');

-- ----------------------------
-- Table structure for master_perbandingan
-- ----------------------------
DROP TABLE IF EXISTS `master_perbandingan`;
CREATE TABLE `master_perbandingan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `compare` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kriteria_sub_sub_id` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_perbandingan
-- ----------------------------

-- ----------------------------
-- Table structure for master_pertanyaan
-- ----------------------------
DROP TABLE IF EXISTS `master_pertanyaan`;
CREATE TABLE `master_pertanyaan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `soal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `perbandingan_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `kriteria_id` int NULL DEFAULT NULL,
  `perbandingan_kriteria_sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `perbandingan_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 125 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_pertanyaan
-- ----------------------------
INSERT INTO `master_pertanyaan` VALUES (1, 'Rasa ingin tahu saya lebih tinggi dibanding kemampuan menyampaikan ide secara jelas', 'Rasa ingin tahu : Kemampuan menyampaikan ide secara jelas', 1, '1 : 2', 'p1', '2024-05-18 01:07:44', '2024-06-07 16:41:45');
INSERT INTO `master_pertanyaan` VALUES (2, 'Kemampuan penyesuaian : Nyaman berbicara di depan umum', 'Kemampuan penyesuaian : Nyaman berbicara di depan umum', 1, '1 : 2', 'p1', '2024-05-18 01:07:44', '2024-05-18 15:03:46');
INSERT INTO `master_pertanyaan` VALUES (3, 'Daya tahan : Kemampuan berkomunikasi dalam tim', 'Daya tahan : Kemampuan berkomunikasi dalam tim', 1, '1 : 2', 'p1', '2024-05-18 01:07:44', '2024-05-18 15:03:53');
INSERT INTO `master_pertanyaan` VALUES (4, 'Evaluasi terus menerus : Dapat membaca dan merespon emosi orang lain', 'Evaluasi terus menerus : Dapat membaca dan merespon emosi orang lain', 1, '1 : 2', 'p1', '2024-05-18 01:07:44', '2024-05-18 15:04:02');
INSERT INTO `master_pertanyaan` VALUES (5, 'Rasa ingin tahu : Analisis Masalah', 'Rasa ingin tahu : Analisis Masalah', 1, '1 : 3', 'p2', '2024-05-18 01:07:44', '2024-05-18 15:04:10');
INSERT INTO `master_pertanyaan` VALUES (6, 'Kemampuan penyesuaian : Kreativitas', 'Kemampuan penyesuaian : Kreativitas', 1, '1 : 3', 'p2', '2024-05-18 01:07:44', '2024-05-18 15:04:17');
INSERT INTO `master_pertanyaan` VALUES (7, 'Daya tahan : Implementasi solusi', 'Daya tahan : Implementasi solusi', 1, '1 : 3', 'p2', '2024-05-18 01:07:44', '2024-05-18 15:04:26');
INSERT INTO `master_pertanyaan` VALUES (8, 'Evaluasi terus menerus : Keberanian mengambil risiko', 'Evaluasi terus menerus : Keberanian mengambil risiko', 1, '1 : 3', 'p2', '2024-05-18 01:07:44', '2024-05-18 15:05:11');
INSERT INTO `master_pertanyaan` VALUES (9, 'Rasa ingin tahu : Penguasaan alat dan perangkat lunak', 'Rasa ingin tahu : Penguasaan alat dan perangkat lunak', 1, '1 : 4', 'p3', '2024-05-18 01:07:44', '2024-05-18 15:05:18');
INSERT INTO `master_pertanyaan` VALUES (10, 'Kemampuan penyesuaian : Kemampuan penyesuaian perkembangan teknologi', 'Kemampuan penyesuaian : Kemampuan penyesuaian perkembangan teknologi', 1, '1 : 4', 'p3', '2024-05-18 01:07:44', '2024-05-18 01:07:44');
INSERT INTO `master_pertanyaan` VALUES (11, 'Daya tahan : Literasi data', 'Daya tahan : Literasi data', 1, '1 : 4', 'p3', '2024-05-18 01:07:44', '2024-05-18 01:07:44');
INSERT INTO `master_pertanyaan` VALUES (12, 'Evaluasi terus menerus : Penggunaan media sosial profesional', 'Evaluasi terus menerus : Penggunaan media sosial profesional', 1, '1 : 4', 'p3', '2024-05-18 01:07:44', '2024-05-18 01:07:44');
INSERT INTO `master_pertanyaan` VALUES (13, 'Rasa ingin tahu : Kefasihan pikiran', 'Rasa ingin tahu : Kefasihan pikiran', 1, '1 : 5', 'p4', '2024-05-18 01:07:44', '2024-05-18 01:07:44');
INSERT INTO `master_pertanyaan` VALUES (14, 'Kemampuan penyesuaian : Keluwesan pikiran', 'Kemampuan penyesuaian : Keluwesan pikiran', 1, '1 : 5', 'p4', '2024-05-18 01:07:44', '2024-05-18 01:07:44');
INSERT INTO `master_pertanyaan` VALUES (15, 'Daya tahan : Keaslian pikiran', 'Daya tahan : Keaslian pikiran', 1, '1 : 5', 'p4', '2024-05-18 01:07:44', '2024-05-18 01:07:44');
INSERT INTO `master_pertanyaan` VALUES (16, 'Evaluasi terus menerus : Keterincian pikiran', 'Evaluasi terus menerus : Keterincian pikiran', 1, '1 : 5', 'p4', '2024-05-18 01:07:44', '2024-05-18 01:07:44');
INSERT INTO `master_pertanyaan` VALUES (17, 'Rasa ingin tahu : Kemampuan kolaborasi', 'Rasa ingin tahu : Kemampuan kolaborasi', 1, '1 : 6', 'p5', '2024-05-18 01:07:44', '2024-05-18 01:07:44');
INSERT INTO `master_pertanyaan` VALUES (18, 'Kemampuan penyesuaian : Kepemimpinan dalam tim', 'Kemampuan penyesuaian : Kepemimpinan dalam tim', 1, '1 : 6', 'p5', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (19, 'Daya tahan : Keterbukaan terhadap ide lain', 'Daya tahan : Keterbukaan terhadap ide lain', 1, '1 : 6', 'p5', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (20, 'Evaluasi terus menerus : Pembagian tugas', 'Evaluasi terus menerus : Pembagian tugas', 1, '1 : 6', 'p5', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (21, 'Kemampuan menyampaikan ide secara jelas : Analisis Masalah', 'Kemampuan menyampaikan ide secara jelas : Analisis Masalah', 1, '2 : 3', 'p6', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (22, 'Nyaman berbicara di depan umum : Kreativitas', 'Nyaman berbicara di depan umum : Kreativitas', 1, '2 : 3', 'p6', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (23, 'Kemampuan berkomunikasi dalam tim : Implementasi solusi', 'Kemampuan berkomunikasi dalam tim : Implementasi solusi', 1, '2 : 3', 'p6', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (24, 'Dapat membaca dan merespon emosi orang lain : Keberanian mengambil risiko', 'Dapat membaca dan merespon emosi orang lain : Keberanian mengambil risiko', 1, '2 : 3', 'p6', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (25, 'Kemampuan menyampaikan ide secara jelas : Penguasaan alat dan perangkat lunak', 'Kemampuan menyampaikan ide secara jelas : Penguasaan alat dan perangkat lunak', 1, '2 : 4', 'p7', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (26, 'Nyaman berbicara di depan umum : Kemampuan penyesuaian perkembangan teknologi', 'Nyaman berbicara di depan umum : Kemampuan penyesuaian perkembangan teknologi', 1, '2 : 4', 'p7', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (27, 'Kemampuan berkomunikasi dalam tim : Literasi data', 'Kemampuan berkomunikasi dalam tim : Literasi data', 1, '2 : 4', 'p7', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (28, 'Dapat membaca dan merespon emosi orang lain : Penggunaan media sosial profesional', 'Dapat membaca dan merespon emosi orang lain : Penggunaan media sosial profesional', 1, '2 : 4', 'p7', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (29, 'Kemampuan menyampaikan ide secara jelas : Kefasihan pikiran', 'Kemampuan menyampaikan ide secara jelas : Kefasihan pikiran', 1, '2 : 5', 'p8', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (30, 'Nyaman berbicara di depan umum : Keluwesan pikiran', 'Nyaman berbicara di depan umum : Keluwesan pikiran', 1, '2 : 5', 'p8', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (31, 'Kemampuan berkomunikasi dalam tim : Keaslian pikiran', 'Kemampuan berkomunikasi dalam tim : Keaslian pikiran', 1, '2 : 5', 'p8', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (32, 'Dapat membaca dan merespon emosi orang lain : Keterincian pikiran', 'Dapat membaca dan merespon emosi orang lain : Keterincian pikiran', 1, '2 : 5', 'p8', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (33, 'Kemampuan menyampaikan ide secara jelas : Kemampuan kolaborasi', 'Kemampuan menyampaikan ide secara jelas : Kemampuan kolaborasi', 1, '2 : 6', 'p9', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (34, 'Nyaman berbicara di depan umum : Kepemimpinan dalam tim', 'Nyaman berbicara di depan umum : Kepemimpinan dalam tim', 1, '2 : 6', 'p9', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (35, 'Kemampuan berkomunikasi dalam tim : Keterbukaan terhadap ide lain', 'Kemampuan berkomunikasi dalam tim : Keterbukaan terhadap ide lain', 1, '2 : 6', 'p9', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (36, 'Dapat membaca dan merespon emosi orang lain : Pembagian tugas', 'Dapat membaca dan merespon emosi orang lain : Pembagian tugas', 1, '2 : 6', 'p9', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (37, 'Analisis Masalah : Penguasaan alat dan perangkat lunak', 'Analisis Masalah : Penguasaan alat dan perangkat lunak', 1, '3 : 4', 'p10', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (38, 'Kreativitas : Kemampuan penyesuaian perkembangan teknologi', 'Kreativitas : Kemampuan penyesuaian perkembangan teknologi', 1, '3 : 4', 'p10', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (39, 'Implementasi solusi : Literasi data', 'Implementasi solusi : Literasi data', 1, '3 : 4', 'p10', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (40, 'Keberanian mengambil risiko : Penggunaan media sosial profesional', 'Keberanian mengambil risiko : Penggunaan media sosial profesional', 1, '3 : 4', 'p10', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (41, 'Analisis Masalah : Kefasihan pikiran', 'Analisis Masalah : Kefasihan pikiran', 1, '3 : 5', 'p11', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (42, 'Kreativitas : Keluwesan pikiran', 'Kreativitas : Keluwesan pikiran', 1, '3 : 5', 'p11', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (43, 'Implementasi solusi : Keaslian pikiran', 'Implementasi solusi : Keaslian pikiran', 1, '3 : 5', 'p11', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (44, 'Keberanian mengambil risiko : Keterincian pikiran', 'Keberanian mengambil risiko : Keterincian pikiran', 1, '3 : 5', 'p11', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (45, 'Analisis Masalah : Kemampuan kolaborasi', 'Analisis Masalah : Kemampuan kolaborasi', 1, '3 : 6', 'p12', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (46, 'Kreativitas : Kepemimpinan dalam tim', 'Kreativitas : Kepemimpinan dalam tim', 1, '3 : 6', 'p12', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (47, 'Implementasi solusi : Keterbukaan terhadap ide lain', 'Implementasi solusi : Keterbukaan terhadap ide lain', 1, '3 : 6', 'p12', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (48, 'Keberanian mengambil risiko : Pembagian tugas', 'Keberanian mengambil risiko : Pembagian tugas', 1, '3 : 6', 'p12', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (49, 'Penguasaan alat dan perangkat lunak : Kefasihan pikiran', 'Penguasaan alat dan perangkat lunak : Kefasihan pikiran', 1, '4 : 5', 'p13', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (50, 'Kemampuan penyesuaian perkembangan teknologi : Keluwesan pikiran', 'Kemampuan penyesuaian perkembangan teknologi : Keluwesan pikiran', 1, '4 : 5', 'p13', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (51, 'Literasi data : Keaslian pikiran', 'Literasi data : Keaslian pikiran', 1, '4 : 5', 'p13', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (52, 'Penggunaan media sosial profesional : Keterincian pikiran', 'Penggunaan media sosial profesional : Keterincian pikiran', 1, '4 : 5', 'p13', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (53, 'Penguasaan alat dan perangkat lunak : Kemampuan kolaborasi', 'Penguasaan alat dan perangkat lunak : Kemampuan kolaborasi', 1, '4 : 6', 'p14', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (54, 'Kemampuan penyesuaian perkembangan teknologi : Kepemimpinan dalam tim', 'Kemampuan penyesuaian perkembangan teknologi : Kepemimpinan dalam tim', 1, '4 : 6', 'p14', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (55, 'Literasi data : Keterbukaan terhadap ide lain', 'Literasi data : Keterbukaan terhadap ide lain', 1, '4 : 6', 'p14', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (56, 'Penggunaan media sosial profesional : Pembagian tugas', 'Penggunaan media sosial profesional : Pembagian tugas', 1, '4 : 6', 'p14', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (57, 'Kefasihan pikiran : Kemampuan kolaborasi', 'Kefasihan pikiran : Kemampuan kolaborasi', 1, '5 : 6', 'p15', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (58, 'Keluwesan pikiran : Kepemimpinan dalam tim', 'Keluwesan pikiran : Kepemimpinan dalam tim', 1, '5 : 6', 'p15', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (59, 'Keaslian pikiran : Keterbukaan terhadap ide lain', 'Keaslian pikiran : Keterbukaan terhadap ide lain', 1, '5 : 6', 'p15', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (60, 'Keterincian pikiran : Pembagian tugas', 'Keterincian pikiran : Pembagian tugas', 1, '5 : 6', 'p15', '2024-05-18 01:07:45', '2024-05-18 01:07:45');
INSERT INTO `master_pertanyaan` VALUES (61, 'Memahami konsep data, informasi, dan pengetahuan : Menggunakan berbagai alat pencarian informasi secara efisien', 'Memahami konsep data, informasi, dan pengetahuan : Menggunakan berbagai alat pencarian informasi secara efisien', 2, '7 : 8', 'p1', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (62, 'Mampu mengidentifikasi sumber informasi yang berbeda : Evaluasi kredibilitas dan keandalan sumber informasi', 'Mampu mengidentifikasi sumber informasi yang berbeda : Evaluasi kredibilitas dan keandalan sumber informasi', 2, '7 : 8', 'p1', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (63, 'Memahami struktur informasi dan cara itu disusun : Memahami hak cipta dan etika dalam penggunaan informasi', 'Memahami struktur informasi dan cara itu disusun : Memahami hak cipta dan etika dalam penggunaan informasi', 2, '7 : 8', 'p1', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (64, 'Mampu merumuskan pertanyaan yang relevan untuk memperoleh informasi yang diperlukan : Memahami teknik untuk menavigasi dan menggunakan berbagai platform informasi', 'Mampu merumuskan pertanyaan yang relevan untuk memperoleh informasi yang diperlukan : Memahami teknik untuk menavigasi dan menggunakan berbagai platform informasi', 2, '7 : 8', 'p1', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (65, 'Memahami konsep data, informasi, dan pengetahuan : Mampu menyusun dan mengelola informasi dengan sistematis', 'Memahami konsep data, informasi, dan pengetahuan : Mampu menyusun dan mengelola informasi dengan sistematis', 2, '7 : 9', 'p2', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (66, 'Mampu mengidentifikasi sumber informasi yang berbeda : Menggunakan alat dan teknologi untuk mengatur informasi', 'Mampu mengidentifikasi sumber informasi yang berbeda : Menggunakan alat dan teknologi untuk mengatur informasi', 2, '7 : 9', 'p2', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (67, 'Memahami struktur informasi dan cara itu disusun : Memahami konsep metadata dan cara mengelolanya', 'Memahami struktur informasi dan cara itu disusun : Memahami konsep metadata dan cara mengelolanya', 2, '7 : 9', 'p2', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (68, 'Mampu merumuskan pertanyaan yang relevan untuk memperoleh informasi yang diperlukan : Mampu membuat dan mengatur backup data untuk menjaga keamanan informasi', 'Mampu merumuskan pertanyaan yang relevan untuk memperoleh informasi yang diperlukan : Mampu membuat dan mengatur backup data untuk menjaga keamanan informasi', 2, '7 : 9', 'p2', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (69, 'Memahami konsep data, informasi, dan pengetahuan : Mampu menarik kesimpulan dari informasi yang berbeda', 'Memahami konsep data, informasi, dan pengetahuan : Mampu menarik kesimpulan dari informasi yang berbeda', 2, '7 : 10', 'p3', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (70, 'Mampu mengidentifikasi sumber informasi yang berbeda : Mengidentifikasi pola dan hubungan antara informasi yang berbeda', 'Mampu mengidentifikasi sumber informasi yang berbeda : Mengidentifikasi pola dan hubungan antara informasi yang berbeda', 2, '7 : 10', 'p3', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (71, 'Memahami struktur informasi dan cara itu disusun : Menggabungkan informasi dari berbagai sumber untuk memperoleh pemahaman yang komprehensif', 'Memahami struktur informasi dan cara itu disusun : Menggabungkan informasi dari berbagai sumber untuk memperoleh pemahaman yang komprehensif', 2, '7 : 10', 'p3', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (72, 'Mampu merumuskan pertanyaan yang relevan untuk memperoleh informasi yang diperlukan : Mampu menggunakan alat analisis untuk mendukung integrasi informasi', 'Mampu merumuskan pertanyaan yang relevan untuk memperoleh informasi yang diperlukan : Mampu menggunakan alat analisis untuk mendukung integrasi informasi', 2, '7 : 10', 'p3', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (73, 'Memahami konsep data, informasi, dan pengetahuan : Menyusun pesan yang jelas dan mudah dipahami', 'Memahami konsep data, informasi, dan pengetahuan : Menyusun pesan yang jelas dan mudah dipahami', 2, '7 : 11', 'p4', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (74, 'Mampu mengidentifikasi sumber informasi yang berbeda : Memilih media komunikasi yang tepat sesuai dengan konteks dan audiens', 'Mampu mengidentifikasi sumber informasi yang berbeda : Memilih media komunikasi yang tepat sesuai dengan konteks dan audiens', 2, '7 : 11', 'p4', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (75, 'Memahami struktur informasi dan cara itu disusun : Mampu menggambarkan informasi secara visual menggunakan grafik atau diagram', 'Memahami struktur informasi dan cara itu disusun : Mampu menggambarkan informasi secara visual menggunakan grafik atau diagram', 2, '7 : 11', 'p4', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (76, 'Mampu merumuskan pertanyaan yang relevan untuk memperoleh informasi yang diperlukan : Mampu mengadaptasi gaya komunikasi sesuai dengan kebutuhan dan preferensi audiens', 'Mampu merumuskan pertanyaan yang relevan untuk memperoleh informasi yang diperlukan : Mampu mengadaptasi gaya komunikasi sesuai dengan kebutuhan dan preferensi audiens', 2, '7 : 11', 'p4', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (77, 'Menggunakan berbagai alat pencarian informasi secara efisien : Mampu menyusun dan mengelola informasi dengan sistematis', 'Menggunakan berbagai alat pencarian informasi secara efisien : Mampu menyusun dan mengelola informasi dengan sistematis', 2, '8 : 9', 'p5', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (78, 'Evaluasi kredibilitas dan keandalan sumber informasi : Menggunakan alat dan teknologi untuk mengatur informasi', 'Evaluasi kredibilitas dan keandalan sumber informasi : Menggunakan alat dan teknologi untuk mengatur informasi', 2, '8 : 9', 'p5', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (79, 'Memahami hak cipta dan etika dalam penggunaan informasi : Memahami konsep metadata dan cara mengelolanya', 'Memahami hak cipta dan etika dalam penggunaan informasi : Memahami konsep metadata dan cara mengelolanya', 2, '8 : 9', 'p5', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (80, 'Memahami teknik untuk menavigasi dan menggunakan berbagai platform informasi : Mampu membuat dan mengatur backup data untuk menjaga keamanan informasi', 'Memahami teknik untuk menavigasi dan menggunakan berbagai platform informasi : Mampu membuat dan mengatur backup data untuk menjaga keamanan informasi', 2, '8 : 9', 'p5', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (81, 'Menggunakan berbagai alat pencarian informasi secara efisien : Mampu menarik kesimpulan dari informasi yang berbeda', 'Menggunakan berbagai alat pencarian informasi secara efisien : Mampu menarik kesimpulan dari informasi yang berbeda', 2, '8 : 10', 'p6', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (82, 'Evaluasi kredibilitas dan keandalan sumber informasi : Mengidentifikasi pola dan hubungan antara informasi yang berbeda', 'Evaluasi kredibilitas dan keandalan sumber informasi : Mengidentifikasi pola dan hubungan antara informasi yang berbeda', 2, '8 : 10', 'p6', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (83, 'Memahami hak cipta dan etika dalam penggunaan informasi : Menggabungkan informasi dari berbagai sumber untuk memperoleh pemahaman yang komprehensif', 'Memahami hak cipta dan etika dalam penggunaan informasi : Menggabungkan informasi dari berbagai sumber untuk memperoleh pemahaman yang komprehensif', 2, '8 : 10', 'p6', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (84, 'Memahami teknik untuk menavigasi dan menggunakan berbagai platform informasi : Mampu menggunakan alat analisis untuk mendukung integrasi informasi', 'Memahami teknik untuk menavigasi dan menggunakan berbagai platform informasi : Mampu menggunakan alat analisis untuk mendukung integrasi informasi', 2, '8 : 10', 'p6', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (85, 'Menggunakan berbagai alat pencarian informasi secara efisien : Menyusun pesan yang jelas dan mudah dipahami', 'Menggunakan berbagai alat pencarian informasi secara efisien : Menyusun pesan yang jelas dan mudah dipahami', 2, '8 : 11', 'p7', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (86, 'Evaluasi kredibilitas dan keandalan sumber informasi : Memilih media komunikasi yang tepat sesuai dengan konteks dan audiens', 'Evaluasi kredibilitas dan keandalan sumber informasi : Memilih media komunikasi yang tepat sesuai dengan konteks dan audiens', 2, '8 : 11', 'p7', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (87, 'Memahami hak cipta dan etika dalam penggunaan informasi : Mampu menggambarkan informasi secara visual menggunakan grafik atau diagram', 'Memahami hak cipta dan etika dalam penggunaan informasi : Mampu menggambarkan informasi secara visual menggunakan grafik atau diagram', 2, '8 : 11', 'p7', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (88, 'Memahami teknik untuk menavigasi dan menggunakan berbagai platform informasi : Mampu mengadaptasi gaya komunikasi sesuai dengan kebutuhan dan preferensi audiens', 'Memahami teknik untuk menavigasi dan menggunakan berbagai platform informasi : Mampu mengadaptasi gaya komunikasi sesuai dengan kebutuhan dan preferensi audiens', 2, '8 : 11', 'p7', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (89, 'Mampu menyusun dan mengelola informasi dengan sistematis : Mampu menarik kesimpulan dari informasi yang berbeda', 'Mampu menyusun dan mengelola informasi dengan sistematis : Mampu menarik kesimpulan dari informasi yang berbeda', 2, '9 : 10', 'p8', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (90, 'Menggunakan alat dan teknologi untuk mengatur informasi : Mengidentifikasi pola dan hubungan antara informasi yang berbeda', 'Menggunakan alat dan teknologi untuk mengatur informasi : Mengidentifikasi pola dan hubungan antara informasi yang berbeda', 2, '9 : 10', 'p8', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (91, 'Memahami konsep metadata dan cara mengelolanya : Menggabungkan informasi dari berbagai sumber untuk memperoleh pemahaman yang komprehensif', 'Memahami konsep metadata dan cara mengelolanya : Menggabungkan informasi dari berbagai sumber untuk memperoleh pemahaman yang komprehensif', 2, '9 : 10', 'p8', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (92, 'Mampu membuat dan mengatur backup data untuk menjaga keamanan informasi : Mampu menggunakan alat analisis untuk mendukung integrasi informasi', 'Mampu membuat dan mengatur backup data untuk menjaga keamanan informasi : Mampu menggunakan alat analisis untuk mendukung integrasi informasi', 2, '9 : 10', 'p8', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (93, 'Mampu menyusun dan mengelola informasi dengan sistematis : Menyusun pesan yang jelas dan mudah dipahami', 'Mampu menyusun dan mengelola informasi dengan sistematis : Menyusun pesan yang jelas dan mudah dipahami', 2, '9 : 11', 'p9', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (94, 'Menggunakan alat dan teknologi untuk mengatur informasi : Memilih media komunikasi yang tepat sesuai dengan konteks dan audiens', 'Menggunakan alat dan teknologi untuk mengatur informasi : Memilih media komunikasi yang tepat sesuai dengan konteks dan audiens', 2, '9 : 11', 'p9', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (95, 'Memahami konsep metadata dan cara mengelolanya : Mampu menggambarkan informasi secara visual menggunakan grafik atau diagram', 'Memahami konsep metadata dan cara mengelolanya : Mampu menggambarkan informasi secara visual menggunakan grafik atau diagram', 2, '9 : 11', 'p9', '2024-05-18 01:07:49', '2024-05-18 01:07:49');
INSERT INTO `master_pertanyaan` VALUES (96, 'Mampu membuat dan mengatur backup data untuk menjaga keamanan informasi : Mampu mengadaptasi gaya komunikasi sesuai dengan kebutuhan dan preferensi audiens', 'Mampu membuat dan mengatur backup data untuk menjaga keamanan informasi : Mampu mengadaptasi gaya komunikasi sesuai dengan kebutuhan dan preferensi audiens', 2, '9 : 11', 'p9', '2024-05-18 01:07:50', '2024-05-18 01:07:50');
INSERT INTO `master_pertanyaan` VALUES (97, 'Mampu menarik kesimpulan dari informasi yang berbeda : Menyusun pesan yang jelas dan mudah dipahami', 'Mampu menarik kesimpulan dari informasi yang berbeda : Menyusun pesan yang jelas dan mudah dipahami', 2, '10 : 11', 'p10', '2024-05-18 01:07:50', '2024-05-18 01:07:50');
INSERT INTO `master_pertanyaan` VALUES (98, 'Mengidentifikasi pola dan hubungan antara informasi yang berbeda : Memilih media komunikasi yang tepat sesuai dengan konteks dan audiens', 'Mengidentifikasi pola dan hubungan antara informasi yang berbeda : Memilih media komunikasi yang tepat sesuai dengan konteks dan audiens', 2, '10 : 11', 'p10', '2024-05-18 01:07:50', '2024-05-18 01:07:50');
INSERT INTO `master_pertanyaan` VALUES (99, 'Menggabungkan informasi dari berbagai sumber untuk memperoleh pemahaman yang komprehensif : Mampu menggambarkan informasi secara visual menggunakan grafik atau diagram', 'Menggabungkan informasi dari berbagai sumber untuk memperoleh pemahaman yang komprehensif : Mampu menggambarkan informasi secara visual menggunakan grafik atau diagram', 2, '10 : 11', 'p10', '2024-05-18 01:07:50', '2024-05-18 01:07:50');
INSERT INTO `master_pertanyaan` VALUES (100, 'Mampu menggunakan alat analisis untuk mendukung integrasi informasi : Mampu mengadaptasi gaya komunikasi sesuai dengan kebutuhan dan preferensi audiens', 'Mampu menggunakan alat analisis untuk mendukung integrasi informasi : Mampu mengadaptasi gaya komunikasi sesuai dengan kebutuhan dan preferensi audiens', 2, '10 : 11', 'p10', '2024-05-18 01:07:50', '2024-05-18 01:07:50');
INSERT INTO `master_pertanyaan` VALUES (101, 'Pemahaman Tata Bahasa : Kemampuan Merangkum', 'Pemahaman Tata Bahasa : Kemampuan Merangkum', 3, '12 : 13', 'p1', '2024-05-18 01:11:25', '2024-05-27 15:33:23');
INSERT INTO `master_pertanyaan` VALUES (102, 'Penguasaan Kosakata : Kemampuan Memberikan Contoh', 'Penguasaan Kosakata : Kemampuan Memberikan Contoh', 3, '12 : 13', 'p1', '2024-05-18 01:11:25', '2024-05-27 15:31:04');
INSERT INTO `master_pertanyaan` VALUES (103, 'Pengetahuan Tentang Sintaksis : Kemampuan Menggunakan Ilustrasi', 'Pengetahuan Tentang Sintaksis : Kemampuan Menggunakan Ilustrasi', 3, '12 : 13', 'p1', '2024-05-18 01:11:25', '2024-05-27 15:33:29');
INSERT INTO `master_pertanyaan` VALUES (104, 'Pemahaman Terhadap Pengucapan : Kemampuan Menggunakan Analogi', 'Pemahaman Terhadap Pengucapan : Kemampuan Menggunakan Analogi', 3, '12 : 13', 'p1', '2024-05-18 01:11:25', '2024-05-27 15:33:36');
INSERT INTO `master_pertanyaan` VALUES (105, 'Pemahaman Tata Bahasa : Kemampuan Mengorganisir Informasi', 'Pemahaman Tata Bahasa : Kemampuan Mengorganisir Informasi', 3, '12 : 14', 'p2', '2024-05-18 01:11:25', '2024-05-27 15:33:44');
INSERT INTO `master_pertanyaan` VALUES (106, 'Penguasaan Kosakata : Kemampuan Menyajikan Data', 'Penguasaan Kosakata : Kemampuan Menyajikan Data', 3, '12 : 14', 'p2', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (107, 'Pengetahuan Tentang Sintaksis : Kemampuan Mengutip Sumber', 'Pengetahuan Tentang Sintaksis : Kemampuan Mengutip Sumber', 3, '12 : 14', 'p2', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (108, 'Pemahaman Terhadap Pengucapan : Kemampuan Memilih Informasi Relevan', 'Pemahaman Terhadap Pengucapan : Kemampuan Memilih Informasi Relevan', 3, '12 : 14', 'p2', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (109, 'Pemahaman Tata Bahasa : Kemampuan Berargumen', 'Pemahaman Tata Bahasa : Kemampuan Berargumen', 3, '12 : 15', 'p3', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (110, 'Penguasaan Kosakata : Kemampuan Berkreasi', 'Penguasaan Kosakata : Kemampuan Berkreasi', 3, '12 : 15', 'p3', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (111, 'Pengetahuan Tentang Sintaksis : Kemampuan Membangun Narasi', 'Pengetahuan Tentang Sintaksis : Kemampuan Membangun Narasi', 3, '12 : 15', 'p3', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (112, 'Pemahaman Terhadap Pengucapan : Kemampuan Memotivasi dan Menginspirasi', 'Pemahaman Terhadap Pengucapan : Kemampuan Memotivasi dan Menginspirasi', 3, '12 : 15', 'p3', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (113, 'Kemampuan Merangkum : Kemampuan Mengorganisir Informasi', 'Kemampuan Merangkum : Kemampuan Mengorganisir Informasi', 3, '13 : 14', 'p4', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (114, 'Kemampuan Memberikan Contoh : Kemampuan Menyajikan Data', 'Kemampuan Memberikan Contoh : Kemampuan Menyajikan Data', 3, '13 : 14', 'p4', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (115, 'Kemampuan Menggunakan Ilustrasi : Kemampuan Mengutip Sumber', 'Kemampuan Menggunakan Ilustrasi : Kemampuan Mengutip Sumber', 3, '13 : 14', 'p4', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (116, 'Kemampuan Menggunakan Analogi : Kemampuan Memilih Informasi Relevan', 'Kemampuan Menggunakan Analogi : Kemampuan Memilih Informasi Relevan', 3, '13 : 14', 'p4', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (117, 'Kemampuan Merangkum : Kemampuan Berargumen', 'Kemampuan Merangkum : Kemampuan Berargumen', 3, '13 : 15', 'p5', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (118, 'Kemampuan Memberikan Contoh : Kemampuan Berkreasi', 'Kemampuan Memberikan Contoh : Kemampuan Berkreasi', 3, '13 : 15', 'p5', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (119, 'Kemampuan Menggunakan Ilustrasi : Kemampuan Membangun Narasi', 'Kemampuan Menggunakan Ilustrasi : Kemampuan Membangun Narasi', 3, '13 : 15', 'p5', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (120, 'Kemampuan Menggunakan Analogi : Kemampuan Memotivasi dan Menginspirasi', 'Kemampuan Menggunakan Analogi : Kemampuan Memotivasi dan Menginspirasi', 3, '13 : 15', 'p5', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (121, 'Kemampuan Mengorganisir Informasi : Kemampuan Berargumen', 'Kemampuan Mengorganisir Informasi : Kemampuan Berargumen', 3, '14 : 15', 'p6', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (122, 'Kemampuan Menyajikan Data : Kemampuan Berkreasi', 'Kemampuan Menyajikan Data : Kemampuan Berkreasi', 3, '14 : 15', 'p6', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (123, 'Kemampuan Mengutip Sumber : Kemampuan Membangun Narasi', 'Kemampuan Mengutip Sumber : Kemampuan Membangun Narasi', 3, '14 : 15', 'p6', '2024-05-18 01:11:25', '2024-05-18 01:11:25');
INSERT INTO `master_pertanyaan` VALUES (124, 'Kemampuan Memilih Informasi Relevan : Kemampuan Memotivasi dan Menginspirasi', 'Kemampuan Memilih Informasi Relevan : Kemampuan Memotivasi dan Menginspirasi', 3, '14 : 15', 'p6', '2024-05-18 01:11:25', '2024-05-27 15:34:31');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_01_09_065932_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (4, '2019_05_27_041507_create_activity_log_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_08_01_204208_create_statuses_table', 1);
INSERT INTO `migrations` VALUES (6, '2019_09_03_104150_create_dokumen_cocs_table', 2);
INSERT INTO `migrations` VALUES (7, '2019_09_03_105113_create_mastertahuns_table', 3);
INSERT INTO `migrations` VALUES (8, '2019_09_03_105723_create_master_tahuns_table', 4);
INSERT INTO `migrations` VALUES (10, '2019_09_03_111551_create_persetujuan_user_lists_table', 5);
INSERT INTO `migrations` VALUES (12, '2019_09_03_144627_create_master_jabatans_table', 7);
INSERT INTO `migrations` VALUES (13, '2019_09_04_141428_create_master_genders_table', 8);
INSERT INTO `migrations` VALUES (15, '2019_09_09_100531_create_master_divisis_table', 10);
INSERT INTO `migrations` VALUES (16, '2019_09_09_102018_create_master_units_table', 11);
INSERT INTO `migrations` VALUES (17, '2019_09_09_102559_create_master_direktorats_table', 12);
INSERT INTO `migrations` VALUES (18, '2019_09_09_103035_create_master_entitas_table', 13);
INSERT INTO `migrations` VALUES (19, '2014_10_12_000000_create_users_table', 14);
INSERT INTO `migrations` VALUES (20, '2019_11_22_085838_create_master_tipe_data_table', 15);
INSERT INTO `migrations` VALUES (21, '2019_11_22_095556_create_master_tipe_data_table', 16);
INSERT INTO `migrations` VALUES (22, '2019_11_22_104219_create_master_levels_table', 17);
INSERT INTO `migrations` VALUES (23, '2019_11_23_075508_create_hak_akses_table', 18);
INSERT INTO `migrations` VALUES (24, '2019_11_25_105006_create_front_ends_table', 19);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` int UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` int NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` int NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 3);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'Create', 'web', '2019-08-22 15:16:08', '2019-08-22 15:16:08');
INSERT INTO `permissions` VALUES (2, 'Read', 'web', '2019-08-22 15:16:08', '2019-08-22 15:16:08');
INSERT INTO `permissions` VALUES (3, 'Update', 'web', '2019-08-22 15:16:08', '2019-08-22 15:16:08');
INSERT INTO `permissions` VALUES (4, 'Delete', 'web', '2019-08-22 15:16:08', '2019-08-22 15:16:08');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` decimal(65, 30) NOT NULL,
  `role_id` decimal(65, 30) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', 'web', '2022-06-01 19:37:52', '2022-06-01 19:37:55');
INSERT INTO `roles` VALUES (2, 'User', 'web', '2022-06-01 19:37:57', '2022-06-01 19:37:59');
INSERT INTO `roles` VALUES (3, 'Staff Departemen', 'web', '2022-06-01 19:37:57', '2022-06-01 19:37:57');
INSERT INTO `roles` VALUES (4, 'TIM UHI', 'web', '2022-06-01 19:37:57', '2022-06-01 19:37:57');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prodi_id` int NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email_verified_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'ADMIN', '12345678', 2, 'admin@spk-ahp.co.id', NULL, '$2y$10$2WLgz.6eW.FGbsgnFxsRgukFynfw.6qMIlmilZjnNyhjIOWLok8nW', '2022-06-06 08:38:47', '2022-07-08 10:53:38');
INSERT INTO `users` VALUES (2, 'LUTHER Y WORABAY', '12345678', 1, 'luther@gmail.com', NULL, '$2y$10$gxfqmdubC9KAfLABdWqqteJNfFEJdFAS5kbWhTn6PnVTjAk.ECN1.', '2024-01-07 16:18:40', '2024-01-15 05:16:37');
INSERT INTO `users` VALUES (3, 'DANI ALI CAHYADI', '12345678', 2, 'dani@gmail.com', NULL, '$2y$10$gxfqmdubC9KAfLABdWqqteJNfFEJdFAS5kbWhTn6PnVTjAk.ECN1.', '2024-01-07 16:18:40', '2024-01-15 05:16:37');

SET FOREIGN_KEY_CHECKS = 1;
