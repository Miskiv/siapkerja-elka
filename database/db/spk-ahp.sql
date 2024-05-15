/*
 Navicat Premium Data Transfer

 Source Server         : DB MySQL
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : spk-ahp

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 24/02/2024 23:16:04
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
) ENGINE = InnoDB AUTO_INCREMENT = 111 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of activity_log
-- ----------------------------
INSERT INTO `activity_log` VALUES (1, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-07 16:25:19', '2024-01-07 16:25:19', NULL);
INSERT INTO `activity_log` VALUES (2, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-07 17:15:46', '2024-01-07 17:15:46', NULL);
INSERT INTO `activity_log` VALUES (3, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-07 17:15:55', '2024-01-07 17:15:55', NULL);
INSERT INTO `activity_log` VALUES (4, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-07 17:16:16', '2024-01-07 17:16:16', NULL);
INSERT INTO `activity_log` VALUES (5, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-07 17:16:21', '2024-01-07 17:16:21', NULL);
INSERT INTO `activity_log` VALUES (6, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-07 17:18:58', '2024-01-07 17:18:58', NULL);
INSERT INTO `activity_log` VALUES (7, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-07 17:19:04', '2024-01-07 17:19:04', NULL);
INSERT INTO `activity_log` VALUES (8, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-07 17:22:45', '2024-01-07 17:22:45', NULL);
INSERT INTO `activity_log` VALUES (9, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-07 17:22:49', '2024-01-07 17:22:49', NULL);
INSERT INTO `activity_log` VALUES (10, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-07 17:53:27', '2024-01-07 17:53:27', NULL);
INSERT INTO `activity_log` VALUES (11, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-07 17:53:33', '2024-01-07 17:53:33', NULL);
INSERT INTO `activity_log` VALUES (12, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 09:14:11', '2024-01-09 09:14:11', NULL);
INSERT INTO `activity_log` VALUES (13, 'default', 'ADMIN Menambahkan pertanyaan dengan id = 10 ', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 13:41:23', '2024-01-09 13:41:23', NULL);
INSERT INTO `activity_log` VALUES (14, 'default', 'ADMIN Menambahkan pertanyaan dengan id = 10 ', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 13:45:50', '2024-01-09 13:45:50', NULL);
INSERT INTO `activity_log` VALUES (15, 'default', 'ADMIN Menambahkan pertanyaan dengan id = 11 ', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 13:47:41', '2024-01-09 13:47:41', NULL);
INSERT INTO `activity_log` VALUES (16, 'default', 'ADMIN Menambahkan pertanyaan dengan id = 12 ', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 13:50:33', '2024-01-09 13:50:33', NULL);
INSERT INTO `activity_log` VALUES (17, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 18:19:16', '2024-01-09 18:19:16', NULL);
INSERT INTO `activity_log` VALUES (18, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 18:24:08', '2024-01-09 18:24:08', NULL);
INSERT INTO `activity_log` VALUES (19, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-09 18:24:15', '2024-01-09 18:24:15', NULL);
INSERT INTO `activity_log` VALUES (20, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-09 21:14:46', '2024-01-09 21:14:46', NULL);
INSERT INTO `activity_log` VALUES (21, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 21:14:53', '2024-01-09 21:14:53', NULL);
INSERT INTO `activity_log` VALUES (22, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 21:17:32', '2024-01-09 21:17:32', NULL);
INSERT INTO `activity_log` VALUES (23, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-09 21:17:40', '2024-01-09 21:17:40', NULL);
INSERT INTO `activity_log` VALUES (24, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-09 23:11:58', '2024-01-09 23:11:58', NULL);
INSERT INTO `activity_log` VALUES (25, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 23:12:08', '2024-01-09 23:12:08', NULL);
INSERT INTO `activity_log` VALUES (26, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 23:12:55', '2024-01-09 23:12:55', NULL);
INSERT INTO `activity_log` VALUES (27, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-09 23:13:10', '2024-01-09 23:13:10', NULL);
INSERT INTO `activity_log` VALUES (28, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-09 23:42:24', '2024-01-09 23:42:24', NULL);
INSERT INTO `activity_log` VALUES (29, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-09 23:42:31', '2024-01-09 23:42:31', NULL);
INSERT INTO `activity_log` VALUES (30, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-10 06:32:55', '2024-01-10 06:32:55', NULL);
INSERT INTO `activity_log` VALUES (31, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-10 09:50:43', '2024-01-10 09:50:43', NULL);
INSERT INTO `activity_log` VALUES (32, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-10 09:50:49', '2024-01-10 09:50:49', NULL);
INSERT INTO `activity_log` VALUES (33, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-10 09:50:57', '2024-01-10 09:50:57', NULL);
INSERT INTO `activity_log` VALUES (34, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-11 17:20:57', '2024-01-11 17:20:57', NULL);
INSERT INTO `activity_log` VALUES (35, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-12 06:49:32', '2024-01-12 06:49:32', NULL);
INSERT INTO `activity_log` VALUES (36, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-12 20:16:59', '2024-01-12 20:16:59', NULL);
INSERT INTO `activity_log` VALUES (37, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-13 08:03:26', '2024-01-13 08:03:26', NULL);
INSERT INTO `activity_log` VALUES (38, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-13 12:25:57', '2024-01-13 12:25:57', NULL);
INSERT INTO `activity_log` VALUES (39, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 09:06:10', '2024-01-14 09:06:10', NULL);
INSERT INTO `activity_log` VALUES (40, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 10:59:04', '2024-01-14 10:59:04', NULL);
INSERT INTO `activity_log` VALUES (41, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 13:10:29', '2024-01-14 13:10:29', NULL);
INSERT INTO `activity_log` VALUES (42, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 13:21:22', '2024-01-14 13:21:22', NULL);
INSERT INTO `activity_log` VALUES (43, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 13:21:36', '2024-01-14 13:21:36', NULL);
INSERT INTO `activity_log` VALUES (44, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 13:22:51', '2024-01-14 13:22:51', NULL);
INSERT INTO `activity_log` VALUES (45, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 13:23:34', '2024-01-14 13:23:34', NULL);
INSERT INTO `activity_log` VALUES (46, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 15:04:07', '2024-01-14 15:04:07', NULL);
INSERT INTO `activity_log` VALUES (47, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 15:04:11', '2024-01-14 15:04:11', NULL);
INSERT INTO `activity_log` VALUES (48, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 15:49:37', '2024-01-14 15:49:37', NULL);
INSERT INTO `activity_log` VALUES (49, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 15:49:45', '2024-01-14 15:49:45', NULL);
INSERT INTO `activity_log` VALUES (50, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 15:58:13', '2024-01-14 15:58:13', NULL);
INSERT INTO `activity_log` VALUES (51, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 15:58:16', '2024-01-14 15:58:16', NULL);
INSERT INTO `activity_log` VALUES (52, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 15:58:33', '2024-01-14 15:58:33', NULL);
INSERT INTO `activity_log` VALUES (53, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 15:58:37', '2024-01-14 15:58:37', NULL);
INSERT INTO `activity_log` VALUES (54, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 15:58:44', '2024-01-14 15:58:44', NULL);
INSERT INTO `activity_log` VALUES (55, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 15:58:50', '2024-01-14 15:58:50', NULL);
INSERT INTO `activity_log` VALUES (56, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 16:00:23', '2024-01-14 16:00:23', NULL);
INSERT INTO `activity_log` VALUES (57, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 16:00:25', '2024-01-14 16:00:25', NULL);
INSERT INTO `activity_log` VALUES (58, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 16:00:47', '2024-01-14 16:00:47', NULL);
INSERT INTO `activity_log` VALUES (59, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 16:00:54', '2024-01-14 16:00:54', NULL);
INSERT INTO `activity_log` VALUES (60, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 17:28:38', '2024-01-14 17:28:38', NULL);
INSERT INTO `activity_log` VALUES (61, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 17:28:41', '2024-01-14 17:28:41', NULL);
INSERT INTO `activity_log` VALUES (62, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 17:29:02', '2024-01-14 17:29:02', NULL);
INSERT INTO `activity_log` VALUES (63, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 3, 'App\\Models\\User', '[]', '2024-01-14 17:29:46', '2024-01-14 17:29:46', NULL);
INSERT INTO `activity_log` VALUES (64, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 17:29:49', '2024-01-14 17:29:49', NULL);
INSERT INTO `activity_log` VALUES (65, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 17:38:54', '2024-01-14 17:38:54', NULL);
INSERT INTO `activity_log` VALUES (66, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 17:39:00', '2024-01-14 17:39:00', NULL);
INSERT INTO `activity_log` VALUES (67, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 18:12:32', '2024-01-14 18:12:32', NULL);
INSERT INTO `activity_log` VALUES (68, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 21:16:40', '2024-01-14 21:16:40', NULL);
INSERT INTO `activity_log` VALUES (69, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 21:17:49', '2024-01-14 21:17:49', NULL);
INSERT INTO `activity_log` VALUES (70, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 21:18:16', '2024-01-14 21:18:16', NULL);
INSERT INTO `activity_log` VALUES (71, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 21:18:23', '2024-01-14 21:18:23', NULL);
INSERT INTO `activity_log` VALUES (72, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 21:18:40', '2024-01-14 21:18:40', NULL);
INSERT INTO `activity_log` VALUES (73, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 21:18:45', '2024-01-14 21:18:45', NULL);
INSERT INTO `activity_log` VALUES (74, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 21:18:52', '2024-01-14 21:18:52', NULL);
INSERT INTO `activity_log` VALUES (75, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 21:18:58', '2024-01-14 21:18:58', NULL);
INSERT INTO `activity_log` VALUES (76, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 21:22:03', '2024-01-14 21:22:03', NULL);
INSERT INTO `activity_log` VALUES (77, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 21:22:08', '2024-01-14 21:22:08', NULL);
INSERT INTO `activity_log` VALUES (78, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 21:23:51', '2024-01-14 21:23:51', NULL);
INSERT INTO `activity_log` VALUES (79, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 21:23:57', '2024-01-14 21:23:57', NULL);
INSERT INTO `activity_log` VALUES (80, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 21:25:14', '2024-01-14 21:25:14', NULL);
INSERT INTO `activity_log` VALUES (81, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 21:26:25', '2024-01-14 21:26:25', NULL);
INSERT INTO `activity_log` VALUES (82, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 21:33:27', '2024-01-14 21:33:27', NULL);
INSERT INTO `activity_log` VALUES (83, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 21:33:31', '2024-01-14 21:33:31', NULL);
INSERT INTO `activity_log` VALUES (84, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 21:34:06', '2024-01-14 21:34:06', NULL);
INSERT INTO `activity_log` VALUES (85, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 21:34:11', '2024-01-14 21:34:11', NULL);
INSERT INTO `activity_log` VALUES (86, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-14 22:41:14', '2024-01-14 22:41:14', NULL);
INSERT INTO `activity_log` VALUES (87, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 3, 'App\\Models\\User', '[]', '2024-01-14 22:42:02', '2024-01-14 22:42:02', NULL);
INSERT INTO `activity_log` VALUES (88, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 3, 'App\\Models\\User', '[]', '2024-01-14 22:42:18', '2024-01-14 22:42:18', NULL);
INSERT INTO `activity_log` VALUES (89, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-14 22:42:26', '2024-01-14 22:42:26', NULL);
INSERT INTO `activity_log` VALUES (90, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 03:37:21', '2024-01-15 03:37:21', NULL);
INSERT INTO `activity_log` VALUES (91, 'default', 'ADMIN Delete User: 3 - ', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 04:52:18', '2024-01-15 04:52:18', NULL);
INSERT INTO `activity_log` VALUES (92, 'default', 'Mengedit User Luther Y Worabay', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 05:16:37', '2024-01-15 05:16:37', NULL);
INSERT INTO `activity_log` VALUES (93, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 05:17:05', '2024-01-15 05:17:05', NULL);
INSERT INTO `activity_log` VALUES (94, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 05:17:36', '2024-01-15 05:17:36', NULL);
INSERT INTO `activity_log` VALUES (95, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 05:37:28', '2024-01-15 05:37:28', NULL);
INSERT INTO `activity_log` VALUES (96, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 05:37:32', '2024-01-15 05:37:32', NULL);
INSERT INTO `activity_log` VALUES (97, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 05:39:53', '2024-01-15 05:39:53', NULL);
INSERT INTO `activity_log` VALUES (98, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-15 05:40:05', '2024-01-15 05:40:05', NULL);
INSERT INTO `activity_log` VALUES (99, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-15 05:59:26', '2024-01-15 05:59:26', NULL);
INSERT INTO `activity_log` VALUES (100, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 05:59:28', '2024-01-15 05:59:28', NULL);
INSERT INTO `activity_log` VALUES (101, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 10:44:53', '2024-01-15 10:44:53', NULL);
INSERT INTO `activity_log` VALUES (102, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 10:45:34', '2024-01-15 10:45:34', NULL);
INSERT INTO `activity_log` VALUES (103, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-15 10:45:42', '2024-01-15 10:45:42', NULL);
INSERT INTO `activity_log` VALUES (104, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-01-15 10:46:44', '2024-01-15 10:46:44', NULL);
INSERT INTO `activity_log` VALUES (105, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 16:18:04', '2024-01-15 16:18:04', NULL);
INSERT INTO `activity_log` VALUES (106, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-15 16:18:19', '2024-01-15 16:18:19', NULL);
INSERT INTO `activity_log` VALUES (107, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-16 11:37:54', '2024-01-16 11:37:54', NULL);
INSERT INTO `activity_log` VALUES (108, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-16 11:38:56', '2024-01-16 11:38:56', NULL);
INSERT INTO `activity_log` VALUES (109, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-01-20 00:13:46', '2024-01-20 00:13:46', NULL);
INSERT INTO `activity_log` VALUES (110, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-02-24 23:06:13', '2024-02-24 23:06:13', NULL);

-- ----------------------------
-- Table structure for analisis
-- ----------------------------
DROP TABLE IF EXISTS `analisis`;
CREATE TABLE `analisis`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `skala` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kesimpulan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of analisis
-- ----------------------------
INSERT INTO `analisis` VALUES (19, '1', '2', '3', NULL, '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `analisis` VALUES (20, '2', '2', '5', NULL, '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `analisis` VALUES (21, '3', '2', '7', NULL, '2024-01-15 05:58:41', '2024-01-15 05:58:41');

-- ----------------------------
-- Table structure for detail
-- ----------------------------
DROP TABLE IF EXISTS `detail`;
CREATE TABLE `detail`  (
  `id` int NOT NULL,
  `id_hasil` int NULL DEFAULT NULL,
  `id_analisis` int NULL DEFAULT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `pertanyaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `jawaban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail
-- ----------------------------

-- ----------------------------
-- Table structure for hasil
-- ----------------------------
DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kesimpulan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hasil
-- ----------------------------
INSERT INTO `hasil` VALUES (1, '2', '12345678', 'S1 Sistem Informasi', 'Unggul di Keterampilan Komunikasi', '2024-01-14 22:15:50', '2024-01-14 22:15:50');
INSERT INTO `hasil` VALUES (2, '2', '12345678', NULL, 'Unggul di Keterampilan Komunikasi', '2024-01-15 05:58:41', '2024-01-15 05:58:41');

-- ----------------------------
-- Table structure for jawaban
-- ----------------------------
DROP TABLE IF EXISTS `jawaban`;
CREATE TABLE `jawaban`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tipe_kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jawaban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jawaban
-- ----------------------------
INSERT INTO `jawaban` VALUES (61, '2', '1', '1', '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `jawaban` VALUES (62, '2', '1', '1', '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `jawaban` VALUES (63, '2', '1', '0', '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `jawaban` VALUES (64, '2', '1', '0', '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `jawaban` VALUES (65, '2', '2', '1', '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `jawaban` VALUES (66, '2', '2', '1', '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `jawaban` VALUES (67, '2', '2', '1', '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `jawaban` VALUES (68, '2', '2', '0', '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `jawaban` VALUES (69, '2', '3', '1', '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `jawaban` VALUES (70, '2', '3', '1', '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `jawaban` VALUES (71, '2', '3', '1', '2024-01-15 05:58:41', '2024-01-15 05:58:41');
INSERT INTO `jawaban` VALUES (72, '2', '3', '1', '2024-01-15 05:58:41', '2024-01-15 05:58:41');

-- ----------------------------
-- Table structure for jurusan
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan`  (
  `id` int NOT NULL,
  `prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `fakultas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kode_fakultas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jurusan
-- ----------------------------

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------

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
-- Table structure for pertanyaan
-- ----------------------------
DROP TABLE IF EXISTS `pertanyaan`;
CREATE TABLE `pertanyaan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `soal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `tipe_kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pertanyaan
-- ----------------------------
INSERT INTO `pertanyaan` VALUES (1, 'Saya lebih mampu menyampaikan ide secara jelas daripada memiliki kemampuan kolaborasi yang baik', '1', '2024-01-09 13:02:59', '2024-01-09 13:02:59');
INSERT INTO `pertanyaan` VALUES (2, 'Saya lebih nyaman berbicara di depan umum daripada memimpin dalam tim', '1', '2024-01-09 13:07:44', '2024-01-09 13:07:44');
INSERT INTO `pertanyaan` VALUES (3, 'Saya lebih mampu berkomunikasi dalam tim daripada keterbukaan terhadap ide lain', '1', '2024-01-09 13:08:16', '2024-01-09 13:08:16');
INSERT INTO `pertanyaan` VALUES (4, 'Dapat membaca dan merespon emosi orang lain daripada pembagian tugas', '1', '2024-01-09 13:08:38', '2024-01-09 13:08:38');
INSERT INTO `pertanyaan` VALUES (5, 'Saya lebih mampu menyampaikan ide secara jelas daripada menganalisis masalah', '2', '2024-01-09 13:09:09', '2024-01-09 13:09:09');
INSERT INTO `pertanyaan` VALUES (6, 'Saya lebih nyaman berbicara di depan umum daripada berkreativitas', '2', '2024-01-09 13:09:37', '2024-01-09 13:09:37');
INSERT INTO `pertanyaan` VALUES (7, 'Saya lebih mampu berkomunikasi dalam tim daripada mengimplementasikan solusi', '2', '2024-01-09 13:09:47', '2024-01-09 13:09:47');
INSERT INTO `pertanyaan` VALUES (8, 'Dapat membaca dan merespon emosi orang lain daripada memberanikan mengambil risiko', '2', '2024-01-09 13:21:54', '2024-01-09 13:21:54');
INSERT INTO `pertanyaan` VALUES (9, 'Saya memiliki kemampuan kolaborasi yang baik daripada menganalisis masalah', '3', '2024-01-09 13:41:06', '2024-01-09 13:41:06');
INSERT INTO `pertanyaan` VALUES (10, 'Saya memimpin dalam tim daripada berkreativitas', '3', '2024-01-09 13:45:50', '2024-01-09 13:45:50');
INSERT INTO `pertanyaan` VALUES (11, 'Saya terbuka terhadap ide lain daripada mengimplementasikan solusi', '3', '2024-01-09 13:47:41', '2024-01-09 13:47:41');
INSERT INTO `pertanyaan` VALUES (12, 'Saya membagikan tugas daripada memberanikan mengambil risiko', '3', '2024-01-09 13:50:33', '2024-01-09 13:50:33');

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

-- ----------------------------
-- Table structure for statuses
-- ----------------------------
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of statuses
-- ----------------------------

-- ----------------------------
-- Table structure for tipe_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `tipe_kriteria`;
CREATE TABLE `tipe_kriteria`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tipe_kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipe_kriteria
-- ----------------------------
INSERT INTO `tipe_kriteria` VALUES (1, 'Keterampilan Komunikasi', 'C1', 'Keterampilan Komunikasi terhadap Kerja Tim', '2024-01-09 12:52:59', '2024-01-09 12:53:03');
INSERT INTO `tipe_kriteria` VALUES (2, 'Kerja Tim', 'C2', 'Keterampilan Komunikasi terhadap Pemecah Masalah', '2024-01-09 12:52:59', '2024-01-09 12:53:03');
INSERT INTO `tipe_kriteria` VALUES (3, 'Pemecahan Masalah', 'C3', 'Kerja Tim terhadap Pemecahan Masalah', '2024-01-09 12:53:43', '2024-01-09 12:53:46');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email_verified_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'ADMIN', '12345678', 'admin@spk-ahp.co.id', NULL, '$2y$10$2WLgz.6eW.FGbsgnFxsRgukFynfw.6qMIlmilZjnNyhjIOWLok8nW', NULL, '123456789012', NULL, '2022-06-06 08:38:47', '2022-07-08 10:53:38');
INSERT INTO `users` VALUES (2, 'LUTHER Y WORABAY', '12345678', 'luther@gmail.com', NULL, '$2y$10$gxfqmdubC9KAfLABdWqqteJNfFEJdFAS5kbWhTn6PnVTjAk.ECN1.', NULL, NULL, NULL, '2024-01-07 16:18:40', '2024-01-15 05:16:37');

-- ----------------------------
-- Table structure for version
-- ----------------------------
DROP TABLE IF EXISTS `version`;
CREATE TABLE `version`  (
  `id` int NOT NULL,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of version
-- ----------------------------
INSERT INTO `version` VALUES (1, '1.0', '2022-04-12', '2022-05-15', 'Beta', NULL, NULL);

-- ----------------------------
-- Table structure for version_details
-- ----------------------------
DROP TABLE IF EXISTS `version_details`;
CREATE TABLE `version_details`  (
  `id` int NOT NULL,
  `id_version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `version_detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of version_details
-- ----------------------------
INSERT INTO `version_details` VALUES (2, '1', 'Penambahan Fitur Quiz', NULL, NULL);
INSERT INTO `version_details` VALUES (3, '1', 'Perubahan Tampilan Persetujuan', NULL, NULL);
INSERT INTO `version_details` VALUES (4, '1', 'Barcode Persetujuan', NULL, NULL);
INSERT INTO `version_details` VALUES (5, '1', 'Rekap Hasil Persetujuan', NULL, NULL);
INSERT INTO `version_details` VALUES (6, '1', 'Fitur Diagram atau Grafik', NULL, NULL);
INSERT INTO `version_details` VALUES (7, '1', 'Penambahan fitur perbaikan dalam halaman rekap persetujuan', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
