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

-- Volcando estructura para tabla cybercore.estado_pedidos
CREATE TABLE IF NOT EXISTS `estado_pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pedido_id` int DEFAULT NULL,
  `estado` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `codigo_seguimiento` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedido_id` (`pedido_id`),
  CONSTRAINT `estado_pedidos_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `tb_pedidos` (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla cybercore.estado_pedidos: ~8 rows (aproximadamente)
REPLACE INTO `estado_pedidos` (`id`, `pedido_id`, `estado`, `codigo_seguimiento`) VALUES
	(1, 38, 'En proceso de entrega', '113472093914'),
	(2, 39, 'EN CAMINO', '575757437101'),
	(3, 40, 'EN CAMINO', '876477576384'),
	(4, 41, 'ENTREGADO', '926034584180'),
	(5, 42, 'Preparando pedido', '384689008797'),
	(6, 43, 'Preparando pedido', '361673534372'),
	(7, 44, 'EN CAMINO', '959590543320'),
	(8, 45, 'Preparando pedido', '800798713180'),
	(9, 46, 'Preparando pedido', '647623973318');

-- Volcando estructura para tabla cybercore.tb_carrito
CREATE TABLE IF NOT EXISTS `tb_carrito` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pedido` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `producto` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `detalle` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `cantidad` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `precio_unitario` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `precio_total` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cybercore.tb_carrito: ~8 rows (aproximadamente)
REPLACE INTO `tb_carrito` (`id`, `id_pedido`, `producto`, `detalle`, `cantidad`, `precio_unitario`, `precio_total`, `estado`) VALUES
	(7, '1', 'Guitarra electrica', '70x40', '1', '99000', '99000', '1'),
	(8, '2', 'bateria electrica', 'gigante', '1', '444990', '444990', '1'),
	(9, '2', 'cables xml', 'ninguno', '3', '6500', '19500', '1'),
	(10, '3', 'dgdf', 'gdfg', '34', '34', '1156', '0'),
	(11, '3', 'fsdf', 'fsdfsdf', '23', '3233', '74359', '0'),
	(12, '3', 'dsfsdf', 'sdfsdf', '3434', '3434', '11792356', '0'),
	(13, '3', 'Mesa de sonido', 'pioner', '2', '300990', '601980', '1'),
	(14, '4', 'guitarra acustica', 'madera de roble', '1', '600000', '600000', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cybercore.tb_pedidos: ~12 rows (aproximadamente)
REPLACE INTO `tb_pedidos` (`id_pedido`, `nombre_origen`, `direccion_origen`, `celular_origen`, `nombre_destino`, `direccion_destino`, `celular_destino`, `obs`, `id_repartidor_asignado`, `estado_pedido`, `estado`, `tipo_pedido`, `codigo_seguimiento`) VALUES
	(38, 'prueba api3', 'asdasdasd@gmail.com', '948485884', '1-9', 'isla endpoint', '947584774', 'fasfasf', '45', 'ASIGNADO', '1', 'SUCURSAL', NULL),
	(39, 'PRUEBA DIFINITIVA CHAVALES', 'asdgfdsagasdg@gmail.com', '948485884', '1-2', 'calla de la prueba', '947584774', 'asdasd', '44', 'PEDIDO TOMADO', '1', 'SUCURSAL', NULL),
	(40, 'prueba api', 'vsdfsdf@gmail.com', '948485884', '1-9', 'calla de la prueba', '947584774', 'bbodga', '44', 'PEDIDO TOMADO', '1', 'BODEGA', NULL),
	(41, 'prueba api', 'vsdfsdf@gmail.com', '948485884', '1-9', 'calla de la prueba', '947584774', 'bbodga', '44', 'PEDIDO FINALIZADO', '1', 'BODEGA', NULL),
	(42, 'prueba api3', 'asdfasdfder2002@gmail.com', '948485884', '1-9', 'calla de la prueba', '947584774', 'sdafasdfsdf', NULL, 'PREPARANDO', '1', 'BODEGA', NULL),
	(43, 'sfsdf', 'sdfsd', 'fsdfsd', 'fsdf', '343434', '33434', 'sdfsd', NULL, 'PREPARANDO', '1', 'BODEGA', NULL),
	(44, 'nombre origen', 'direccion origen', '9339485995', 'nom destino', 'direccion ddestino', '938495005', 'comentario', '45', 'PEDIDO TOMADO', '1', 'BODEGA', NULL),
	(45, 'html', 'con coso', '99293993', 'sfdgsdg', 'destino', '9384784', 'sdfsadf', NULL, 'PREPARANDO', '1', 'BODEGA', NULL),
	(46, 'gdfg', 'b', 'c', 'd', '3434', '9384784', 'prueba de otro proyecto', NULL, 'PREPARANDO', '1', 'BODEGA', NULL),
	(48, 'asdfasdf', 'asdfasdf', '12341234', 'asdfasdf', 'asdfasdf', '12341234', 'fsdafg', NULL, NULL, NULL, 'SUCURSAL', NULL),
	(49, 'dfsgfsda', 'gfsgfdsg', '231142134', 'dfsgfsda', 'gfsgfdsg', '231142134', 'gfsg', NULL, 'PREPARANDO', '1', 'BODEGA', NULL),
	(50, 'ggdfsgsd', 'fdsgsfdgsdf', '23423443', 'ggdfsgsd', 'fdsgsfdgsdf', '23423443', 'bbb', NULL, 'PREPARANDO', '1', 'BODEGA', '466142968277255');

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
	(1, 'benja', 'elguru', 'alumnito1', '1-9', '2002-06-03', 'MASCULINO', '940327883', NULL, 'prueba2@duocuc.cl', '123', NULL, 'ADMINISTRADOR', '1'),
	(41, 'Jose', 'Pepe', 'Grillo', '1-3', '1973-06-03', 'HOMBRE', '965849858', NULL, 'elpepe@gmail.com', '123', NULL, 'ADMINISTRADOR', '1'),
	(44, 'Bastian', 'Landaeta', 'Loyola', '1212121', '1992-03-09', 'HOMBRE', '940327883', NULL, 'prueba1@gmail.com', '123', NULL, 'REPARTIDOR', '1'),
	(45, 'elpepe', 'profesor', 'decounter', '34949934-2', '1950-04-04', 'MASCULINO', '940327883', NULL, 'elpepe1@gmail.com', '123', NULL, 'REPARTIDOR', '1'),
	(46, 'Alexander', 'Salazar', 'Loaza', '2100-3', '1973-06-03', 'FEMENINO', '940327883', NULL, 'admin@gmail.com', '123', NULL, 'ADMINISTRADOR', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
