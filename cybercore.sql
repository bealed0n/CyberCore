-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para cybercore
CREATE DATABASE IF NOT EXISTS `cybercore` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cybercore`;

-- Volcando estructura para tabla cybercore.tb_pedidos
CREATE TABLE IF NOT EXISTS `tb_pedidos` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `nombre_origen` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `direccion_origen` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `celular_origen` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `nombre_destino` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `direccion_destino` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `celular_destino` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `obs` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `id_repartidor_asignado` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estado_pedido` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `tipo_pedido` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `codigo_seguimiento` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cybercore.tb_pedidos: ~8 rows (aproximadamente)
REPLACE INTO `tb_pedidos` (`id_pedido`, `nombre_origen`, `direccion_origen`, `celular_origen`, `nombre_destino`, `direccion_destino`, `celular_destino`, `obs`, `id_repartidor_asignado`, `estado_pedido`, `estado`, `tipo_pedido`, `codigo_seguimiento`) VALUES
	(99, 'Jorge López', 'Calle C 26', '945036009', 'Jorge Aulestia', 'Calle G 59', '945678500', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '025846580888'),
	(105, 'Music Pro', 'Puente alto', '222111222', 'nck', 'cioa', '222', '\r\n        bajo - Cantidad: 2\r\n    ', NULL, 'PREPARANDO', '1', 'SUCURSAL', '157038420875'),
	(106, 'Music Pro', 'Puente alto', '222111222', 'nyafiu', 'changos 2162', '935532240', '\r\n        bajo - Cantidad: 1\r\n    ', NULL, 'PREPARANDO', '1', 'SUCURSAL', '321352312738'),
	(107, 'Music Pro', 'Puente alto', '222111222', 'a', 'd', '1', '\r\n        bajo - Cantidad: 1\r\n    ', NULL, 'PREPARANDO', '1', 'SUCURSAL', '503992816116'),
	(108, 'Music Pro', 'Puente alto', '222111222', 'cio', 'xmka', '2992', '\r\n        bajo - Cantidad: 1\r\n    ', '45', 'PEDIDO TOMADO', '1', 'SUCURSAL', '097206360534'),
	(109, 'Music Pro', 'Puente alto', '222111222', 'cop', 'cskl', '0303', '\r\n        kosdnjmfdsg - Cantidad: 2\r\n    ', '45', 'PEDIDO FINALIZADO', '1', 'SUCURSAL', '835932067885'),
	(110, 'María Aulestia', 'Calle E 76', '933831653', 'Ronnie Sánchez', 'Calle D 95', '935163009', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '897573402539'),
	(111, 'Music Pro', 'Puente alto', '222111222', 'joselito', 'changos 2162', '111111', '\r\n        guitarra - Cantidad: 2\r\n    ', '45', 'ASIGNADO', '1', 'SUCURSAL', '794443311354');

-- Volcando estructura para tabla cybercore.tb_usuarios
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_paterno` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_materno` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rut` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_perfil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cybercore.tb_usuarios: ~2 rows (aproximadamente)
REPLACE INTO `tb_usuarios` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `rut`, `fecha_nacimiento`, `sexo`, `celular`, `foto_perfil`, `email`, `password`, `token`, `cargo`, `estado`) VALUES
	(45, 'elpepe', 'profesor', 'decounter', '34949934-2', '1950-04-04', 'MASCULINO', '940327883', NULL, 'repartidor@gmail.com', '$2y$10$Wxg1pQX6zjuBj.ga2JKF8O08nHsB3w9ojhY8Wk5acQQnIskLkGtK.', NULL, 'REPARTIDOR', '1'),
	(52, 'admin', 'admin', 'admin', '1-2', '2002-03-03', 'MASCULINO', '938494884', NULL, 'admin@gmail.com', '$2y$10$VThLQGJon3wYoGSgoRk4ZO0vunH/tMQQEhS1BphHsv2jKFPXaUK6G', NULL, 'ADMINISTRADOR', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
