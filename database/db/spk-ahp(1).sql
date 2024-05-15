/*
 Navicat Premium Data Transfer

 Source Server         : Local Saya
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : spk-ahp

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 15/05/2024 08:45:11
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
) ENGINE = InnoDB AUTO_INCREMENT = 130 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
INSERT INTO `activity_log` VALUES (111, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-05-05 13:52:52', '2024-05-05 13:52:52', NULL);
INSERT INTO `activity_log` VALUES (112, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-05-05 13:53:15', '2024-05-05 13:53:15', NULL);
INSERT INTO `activity_log` VALUES (113, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-05-05 13:53:34', '2024-05-05 13:53:34', NULL);
INSERT INTO `activity_log` VALUES (114, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-05-05 14:09:44', '2024-05-05 14:09:44', NULL);
INSERT INTO `activity_log` VALUES (115, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-05-05 14:09:50', '2024-05-05 14:09:50', NULL);
INSERT INTO `activity_log` VALUES (116, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-05-05 14:10:09', '2024-05-05 14:10:09', NULL);
INSERT INTO `activity_log` VALUES (117, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-05-05 14:10:16', '2024-05-05 14:10:16', NULL);
INSERT INTO `activity_log` VALUES (118, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 2, 'App\\Models\\User', '[]', '2024-05-05 14:35:04', '2024-05-05 14:35:04', NULL);
INSERT INTO `activity_log` VALUES (119, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-05-05 14:35:10', '2024-05-05 14:35:10', NULL);
INSERT INTO `activity_log` VALUES (120, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-05-05 15:29:36', '2024-05-05 15:29:36', NULL);
INSERT INTO `activity_log` VALUES (121, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 3, 'App\\Models\\User', '[]', '2024-05-05 15:29:46', '2024-05-05 15:29:46', NULL);
INSERT INTO `activity_log` VALUES (122, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 3, 'App\\Models\\User', '[]', '2024-05-05 16:17:55', '2024-05-05 16:17:55', NULL);
INSERT INTO `activity_log` VALUES (123, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-05-05 16:18:08', '2024-05-05 16:18:08', NULL);
INSERT INTO `activity_log` VALUES (124, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-05-09 19:36:37', '2024-05-09 19:36:37', NULL);
INSERT INTO `activity_log` VALUES (125, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-05-10 17:52:14', '2024-05-10 17:52:14', NULL);
INSERT INTO `activity_log` VALUES (126, 'default', 'Melakukan Logout Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-05-10 19:29:59', '2024-05-10 19:29:59', NULL);
INSERT INTO `activity_log` VALUES (127, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-05-10 20:51:59', '2024-05-10 20:51:59', NULL);
INSERT INTO `activity_log` VALUES (128, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-05-11 10:02:55', '2024-05-11 10:02:55', NULL);
INSERT INTO `activity_log` VALUES (129, 'default', 'Melakukan Login Aplikasi', NULL, NULL, 1, 'App\\Models\\User', '[]', '2024-05-15 08:44:12', '2024-05-15 08:44:12', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of analisis
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hasil
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jawaban
-- ----------------------------
INSERT INTO `jawaban` VALUES (1, '2', '1', '1', '2024-05-05 14:28:39', '2024-05-05 14:28:39');
INSERT INTO `jawaban` VALUES (2, '2', '1', '1', '2024-05-05 14:28:39', '2024-05-05 14:28:39');
INSERT INTO `jawaban` VALUES (3, '2', '1', '1', '2024-05-05 14:28:39', '2024-05-05 14:28:39');
INSERT INTO `jawaban` VALUES (4, '2', '1', '1', '2024-05-05 14:28:39', '2024-05-05 14:28:39');
INSERT INTO `jawaban` VALUES (5, '2', '2', '1', '2024-05-05 14:28:39', '2024-05-05 14:28:39');
INSERT INTO `jawaban` VALUES (6, '2', '2', '0', '2024-05-05 14:28:39', '2024-05-05 14:28:39');
INSERT INTO `jawaban` VALUES (7, '2', '2', '1', '2024-05-05 14:28:39', '2024-05-05 14:28:39');
INSERT INTO `jawaban` VALUES (8, '2', '2', '1', '2024-05-05 14:28:39', '2024-05-05 14:28:39');
INSERT INTO `jawaban` VALUES (9, '2', '3', '1', '2024-05-05 14:28:39', '2024-05-05 14:28:39');
INSERT INTO `jawaban` VALUES (10, '2', '3', '1', '2024-05-05 14:28:39', '2024-05-05 14:28:39');
INSERT INTO `jawaban` VALUES (11, '2', '3', '1', '2024-05-05 14:28:39', '2024-05-05 14:28:39');
INSERT INTO `jawaban` VALUES (12, '2', '3', '1', '2024-05-05 14:28:39', '2024-05-05 14:28:39');

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `master_kriteria_sub` VALUES (1, '1', 'Kemampuan Belajar dan Adaptasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (2, '1', 'Kemampuan Berkomunikasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (3, '1', 'Kemampuan Pemecahan Masalah', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (4, '1', 'Keterampilan Teknologi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (5, '1', 'Keterampilan Berpikir Kreatif', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (6, '1', 'Kemampuan bekerja dalam tim', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (7, '2', 'Kemampuan Mendefinisikan Informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (8, '2', 'Kemampuan Mengakses Informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (9, '2', 'Kemampuan Mengelola Informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (10, '2', 'Kemampuan Mengintegrasikan Informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (11, '2', 'Kemampuan Mengkomunikasikan Informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (12, '3', 'Kemampuan Menguasai Konsep', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (13, '3', 'Kemampuan Menjelaskan Informasi', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (14, '3', 'Kemampuan Menyampaikan Fakta', '2024-05-10 21:07:42', '2024-05-10 21:07:42');
INSERT INTO `master_kriteria_sub` VALUES (15, '3', 'Kemampuan Mengutarakan Ide dan Gagasan', '2024-05-10 21:07:42', '2024-05-10 21:07:42');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

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
  `kriteria_id` int NULL DEFAULT NULL,
  `tipe_kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_pertanyaan
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
INSERT INTO `users` VALUES (3, 'DANI ALI CAHYADI', '12345678', 'dani@gmail.com', NULL, '$2y$10$gxfqmdubC9KAfLABdWqqteJNfFEJdFAS5kbWhTn6PnVTjAk.ECN1.', NULL, NULL, NULL, '2024-01-07 16:18:40', '2024-01-15 05:16:37');

SET FOREIGN_KEY_CHECKS = 1;
