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
  `obs` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `id_repartidor_asignado` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estado_pedido` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `tipo_pedido` varchar(255) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `codigo_seguimiento` varchar(30) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cybercore.tb_pedidos: ~13 rows (aproximadamente)
REPLACE INTO `tb_pedidos` (`id_pedido`, `nombre_origen`, `direccion_origen`, `celular_origen`, `nombre_destino`, `direccion_destino`, `celular_destino`, `obs`, `id_repartidor_asignado`, `estado_pedido`, `estado`, `tipo_pedido`, `codigo_seguimiento`) VALUES
	(52, 'Juan Fernández', 'Calle E 50', '0974207175', 'María Pérez', 'Calle A 92', '0984744448', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '601743412682'),
	(53, 'Carlos Fernández', 'Calle A 97', '0995852473', 'Laura García', 'Calle C 75', '0949421000', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '206312652271'),
	(54, 'Pedro García', 'Calle C 35', '0928825467', 'Carlos Fernández', 'Calle C 40', '0943283288', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '790994973083'),
	(55, 'María López', 'Calle D 30', '0959707320', 'Laura López', 'Calle A 89', '0938017676', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '025892106509'),
	(56, 'María Pérez', 'Calle E 90', '0954399344', 'Carlos Fernández', 'Calle D 91', '0922565061', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '340725651827'),
	(57, 'María Gómez', 'Calle C 5', '0906337597', 'Juan Fernández', 'Calle C 21', '0953773704', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '295151790334'),
	(58, 'María López', 'Calle E 39', '0976454141', 'Pedro Gómez', 'Calle E 26', '0990553080', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '457181269707'),
	(59, 'Carlos Fernández', 'Calle E 53', '0934479563', 'Pedro López', 'Calle C 37', '0922662589', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '729555976505'),
	(60, 'María Fernández', 'Calle E 43', '0917638857', 'María Gómez', 'Calle B 83', '0984174076', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '267511474634'),
	(61, 'Laura Fernández', 'Calle B 20', '0916579779', 'Carlos Gómez', 'Calle C 49', '0927664613', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '228489034963'),
	(62, 'Laura Fernández', 'Calle E 28', '0993112126', 'Juan García', 'Calle C 31', '0958229460', 'Envío de prueba', NULL, 'PREPARANDO', '1', 'SUCURSAL', '732535100533'),
	(63, 'Carlos García', 'Calle B 1', '0950013664', 'María Pérez', 'Calle B 15', '0931914985', 'Envío de prueba', '44', 'ASIGNADO', '1', 'SUCURSAL', '066224329658');

-- Volcando estructura para tabla cybercore.tb_usuarios
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_paterno` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_materno` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rut` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_perfil` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cybercore.tb_usuarios: ~5 rows (aproximadamente)
REPLACE INTO `tb_usuarios` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `rut`, `fecha_nacimiento`, `sexo`, `celular`, `foto_perfil`, `email`, `password`, `token`, `cargo`, `estado`) VALUES
	(1, 'benja', 'elguru', 'alumnito1', '1-9', '2002-06-03', 'MASCULINO', '940327883', NULL, 'prueba2@duocuc.cl', '123', NULL, 'ADMINISTRADOR', '0'),
	(41, 'Jose', 'Pepe', 'Grillo', '1-3', '1973-06-03', 'MASCULINO', '965849858', NULL, 'elpepe@gmail.com', '123', NULL, 'ADMINISTRADOR', '0'),
	(44, 'Bastian', 'Landaeta', 'Loyola', '1212121', '1992-03-09', 'FEMENINO', '940327883', NULL, 'prueba1@gmail.com', '123', NULL, 'REPARTIDOR', '1'),
	(45, 'elpepe', 'profesor', 'decounter', '34949934-2', '1950-04-04', 'MASCULINO', '940327883', NULL, 'elpepe1@gmail.com', '123', NULL, 'REPARTIDOR', '1'),
	(46, 'Alexander', 'Salazar', 'Loaza', '2100-3', '1973-06-03', 'FEMENINO', '940327883', NULL, 'admin@gmail.com', '123', NULL, 'ADMINISTRADOR', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
