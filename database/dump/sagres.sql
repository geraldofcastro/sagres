/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : sagres

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 13/07/2018 16:22:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alunos
-- ----------------------------
DROP TABLE IF EXISTS `alunos`;
CREATE TABLE `alunos`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricula` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `alunos_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of alunos
-- ----------------------------
INSERT INTO `alunos` VALUES (7, 7992019, 'Augusto Diego Lopes', 'Rua Cinco', 'Balneário Califórnia', 11676026, 'Caraguatatuba', 'SP', 'augustodiegolopes-96@kmspublicidade.com.br', '2018-07-13 18:43:21', '2018-07-13 18:43:21');
INSERT INTO `alunos` VALUES (8, 7784936, 'Hugo Gustavo Mateus da Rosa', 'Rua Herondina Cavalcante Dantas', 'Dom Jaime Câmara', 59628800, 'Mossoró', 'RN', 'hugogustavomateusdarosa@fundasa.com.br', '2018-07-13 18:44:21', '2018-07-13 18:44:21');
INSERT INTO `alunos` VALUES (9, 9683658, 'Kaique Lucas Victor Araújo', 'Rua José Alves Pereira', 'Farolândia', 49030460, 'Aracaju', 'SE', 'kaiquelucasvictoraraujo@petrobrais.com.br', '2018-07-13 18:45:15', '2018-07-13 18:45:15');
INSERT INTO `alunos` VALUES (10, 8792450, 'Tiago Elias Castro', 'Avenida Júlio César Jarros', 'Jardim Alto da Boa Vista', 87506400, 'Umuarama', 'PR', 'tiagoeliascastro@dcabr.org.br', '2018-07-13 18:46:04', '2018-07-13 18:46:04');
INSERT INTO `alunos` VALUES (11, 8806642, 'Cláudio Ruan Almada', 'Rua Danyelle Bouças Fernandes', 'Jardim Tropical', 86087636, 'Londrina', 'PR', 'claudioruanalmada@centroin.com.br', '2018-07-13 18:46:45', '2018-07-13 18:46:45');

-- ----------------------------
-- Table structure for disciplinas
-- ----------------------------
DROP TABLE IF EXISTS `disciplinas`;
CREATE TABLE `disciplinas`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `disciplina` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of disciplinas
-- ----------------------------
INSERT INTO `disciplinas` VALUES (9, 'Matemática', '2018-07-13 18:38:43', '2018-07-13 18:38:43');
INSERT INTO `disciplinas` VALUES (10, 'Português', '2018-07-13 18:38:50', '2018-07-13 18:38:50');
INSERT INTO `disciplinas` VALUES (11, 'Física', '2018-07-13 18:38:56', '2018-07-13 18:38:56');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_07_13_015057_create_alunos_table', 2);
INSERT INTO `migrations` VALUES (4, '2018_07_13_025528_create_disciplinas_table', 2);
INSERT INTO `migrations` VALUES (5, '2018_07_13_025614_create_notas_table', 2);
INSERT INTO `migrations` VALUES (6, '2018_07_13_142240_alter_notas_table', 3);

-- ----------------------------
-- Table structure for notas
-- ----------------------------
DROP TABLE IF EXISTS `notas`;
CREATE TABLE `notas`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nota` int(11) NOT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  `disciplina_id` int(10) UNSIGNED NOT NULL,
  `aluno_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `notas_disciplina_id_foreign`(`disciplina_id`) USING BTREE,
  INDEX `notas_aluno_id_foreign`(`aluno_id`) USING BTREE,
  CONSTRAINT `notas_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `notas_disciplina_id_foreign` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of notas
-- ----------------------------
INSERT INTO `notas` VALUES (11, 10, '2018-07-13 18:46:59', '2018-07-13 18:46:59', 9, 7);
INSERT INTO `notas` VALUES (12, 5, '2018-07-13 18:47:11', '2018-07-13 18:47:11', 9, 7);
INSERT INTO `notas` VALUES (13, 3, '2018-07-13 18:47:18', '2018-07-13 18:47:18', 9, 7);
INSERT INTO `notas` VALUES (14, 7, '2018-07-13 18:47:53', '2018-07-13 18:47:53', 10, 7);
INSERT INTO `notas` VALUES (15, 8, '2018-07-13 18:48:03', '2018-07-13 18:48:03', 10, 7);
INSERT INTO `notas` VALUES (16, 4, '2018-07-13 18:48:12', '2018-07-13 18:48:12', 10, 7);
INSERT INTO `notas` VALUES (17, 10, '2018-07-13 18:48:23', '2018-07-13 18:48:23', 11, 7);
INSERT INTO `notas` VALUES (18, 5, '2018-07-13 18:48:33', '2018-07-13 18:48:33', 11, 7);
INSERT INTO `notas` VALUES (19, 7, '2018-07-13 18:48:43', '2018-07-13 18:48:43', 11, 7);
INSERT INTO `notas` VALUES (20, 5, '2018-07-13 18:46:59', '2018-07-13 18:46:59', 9, 8);
INSERT INTO `notas` VALUES (21, 8, '2018-07-13 18:47:11', '2018-07-13 18:47:11', 9, 8);
INSERT INTO `notas` VALUES (22, 3, '2018-07-13 18:47:18', '2018-07-13 18:47:18', 9, 8);
INSERT INTO `notas` VALUES (23, 7, '2018-07-13 18:47:53', '2018-07-13 18:47:53', 10, 8);
INSERT INTO `notas` VALUES (24, 6, '2018-07-13 18:48:03', '2018-07-13 18:48:03', 10, 8);
INSERT INTO `notas` VALUES (25, 10, '2018-07-13 18:48:12', '2018-07-13 18:48:12', 10, 8);
INSERT INTO `notas` VALUES (26, 5, '2018-07-13 18:48:23', '2018-07-13 18:48:23', 11, 8);
INSERT INTO `notas` VALUES (27, 7, '2018-07-13 18:48:33', '2018-07-13 18:48:33', 11, 8);
INSERT INTO `notas` VALUES (28, 9, '2018-07-13 18:48:43', '2018-07-13 18:48:43', 11, 8);
INSERT INTO `notas` VALUES (29, 3, '2018-07-13 18:46:59', '2018-07-13 18:46:59', 9, 9);
INSERT INTO `notas` VALUES (30, 5, '2018-07-13 18:47:11', '2018-07-13 18:47:11', 9, 9);
INSERT INTO `notas` VALUES (31, 7, '2018-07-13 18:47:18', '2018-07-13 18:47:18', 9, 9);
INSERT INTO `notas` VALUES (32, 9, '2018-07-13 18:47:53', '2018-07-13 18:47:53', 10, 9);
INSERT INTO `notas` VALUES (33, 4, '2018-07-13 18:48:03', '2018-07-13 18:48:03', 10, 9);
INSERT INTO `notas` VALUES (34, 6, '2018-07-13 18:48:12', '2018-07-13 18:48:12', 10, 9);
INSERT INTO `notas` VALUES (35, 7, '2018-07-13 18:48:23', '2018-07-13 18:48:23', 11, 9);
INSERT INTO `notas` VALUES (36, 9, '2018-07-13 18:48:33', '2018-07-13 18:48:33', 11, 9);
INSERT INTO `notas` VALUES (37, 10, '2018-07-13 18:48:43', '2018-07-13 18:48:43', 11, 9);
INSERT INTO `notas` VALUES (38, 1, '2018-07-13 18:46:59', '2018-07-13 18:46:59', 9, 10);
INSERT INTO `notas` VALUES (39, 2, '2018-07-13 18:47:11', '2018-07-13 18:47:11', 9, 10);
INSERT INTO `notas` VALUES (40, 9, '2018-07-13 18:47:18', '2018-07-13 18:47:18', 9, 10);
INSERT INTO `notas` VALUES (41, 5, '2018-07-13 18:47:53', '2018-07-13 18:47:53', 10, 10);
INSERT INTO `notas` VALUES (42, 4, '2018-07-13 18:48:03', '2018-07-13 18:48:03', 10, 10);
INSERT INTO `notas` VALUES (43, 5, '2018-07-13 18:48:12', '2018-07-13 18:48:12', 10, 10);
INSERT INTO `notas` VALUES (44, 6, '2018-07-13 18:48:23', '2018-07-13 18:48:23', 11, 10);
INSERT INTO `notas` VALUES (45, 8, '2018-07-13 18:48:33', '2018-07-13 18:48:33', 11, 10);
INSERT INTO `notas` VALUES (46, 9, '2018-07-13 18:48:43', '2018-07-13 18:48:43', 11, 10);
INSERT INTO `notas` VALUES (47, 4, '2018-07-13 18:46:59', '2018-07-13 18:46:59', 9, 11);
INSERT INTO `notas` VALUES (48, 5, '2018-07-13 18:47:11', '2018-07-13 18:47:11', 9, 11);
INSERT INTO `notas` VALUES (49, 10, '2018-07-13 18:47:18', '2018-07-13 18:47:18', 9, 11);
INSERT INTO `notas` VALUES (50, 5, '2018-07-13 18:47:53', '2018-07-13 18:47:53', 10, 11);
INSERT INTO `notas` VALUES (51, 7, '2018-07-13 18:48:03', '2018-07-13 18:48:03', 10, 11);
INSERT INTO `notas` VALUES (52, 6, '2018-07-13 18:48:12', '2018-07-13 18:48:12', 10, 11);
INSERT INTO `notas` VALUES (53, 4, '2018-07-13 18:48:23', '2018-07-13 18:48:23', 11, 11);
INSERT INTO `notas` VALUES (54, 6, '2018-07-13 18:48:33', '2018-07-13 18:48:33', 11, 11);
INSERT INTO `notas` VALUES (55, 8, '2018-07-13 18:48:43', '2018-07-13 18:48:43', 11, 11);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Geraldo', 'tandundem@gmail.com', '$2y$10$GqfNml2vpnV5Un26jmiP2eUcH/yp8GUdP9thVJXFYwSnrLUDZw7hy', 'FAS4oshpraCVC9bgFtJNLBmuzedx3kG3kuP2oTseIJgBbGPCqLhszxbwbF6D', '2018-07-13 13:11:18', '2018-07-13 13:11:18');

SET FOREIGN_KEY_CHECKS = 1;
