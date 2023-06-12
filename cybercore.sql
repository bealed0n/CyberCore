

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
  `estado` varchar(20) DEFAULT NULL,
  `codigo_seguimiento` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedido_id` (`pedido_id`),
  CONSTRAINT `estado_pedidos_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `tb_pedidos` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla cybercore.estado_pedidos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cybercore.saludos
CREATE TABLE IF NOT EXISTS `saludos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla cybercore.saludos: ~16 rows (aproximadamente)
REPLACE INTO `saludos` (`id`, `mensaje`) VALUES
	(1, 'Hola como estas'),
	(2, 'Hola como estas'),
	(3, 'Hola como estas'),
	(4, 'Hola como estas'),
	(5, 'Hola como estas'),
	(6, 'Hola como estas'),
	(7, 'Hola como estas'),
	(8, 'Hola como estas'),
	(9, 'Hola como estas'),
	(10, 'Hola como estas'),
	(11, 'Hola como estas'),
	(12, 'Hola como estas'),
	(13, 'Hola como estas'),
	(14, 'Hola como estas'),
	(15, 'Hola como estas'),
	(16, 'Hola como estas');

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
  `nombre_cliente` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `rut_cliente` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `celular_cliente` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `celular_referencia_cliente` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `email_cliente` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `direccion_cliente` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `id_direccion_cliente` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `costo_pedido` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `costo_delivery` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `obs` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `id_carrito` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `id_repartidor_asignado` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estado_pedido` varchar(512) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cybercore.tb_pedidos: ~10 rows (aproximadamente)
REPLACE INTO `tb_pedidos` (`id_pedido`, `nombre_cliente`, `rut_cliente`, `celular_cliente`, `celular_referencia_cliente`, `email_cliente`, `direccion_cliente`, `id_direccion_cliente`, `costo_pedido`, `costo_delivery`, `obs`, `id_carrito`, `id_repartidor_asignado`, `estado_pedido`, `estado`) VALUES
	(4, 'prdrito', '1-921', '940327883', '940327883', 'pedrito@gmail.com', 'isla walton 543', '', '99000', '4990', 'objeto delicado', '1', '44', 'PEDIDO FINALIZADO', '1'),
	(5, 'matias del rio', '494-2', '940327883', '992939323', 'matiaselmismisimo@gmail.com', 'sucasa 123', '', '464490', '7000', 'arbol fuera de casa', '2', '44', 'PEDIDO FINALIZADO', '1'),
	(9, 'probando api', '1-9201', '940327883', '940327883', 'benjita@gmail.com', 'calle muy falsa 123', NULL, NULL, '9990', 'que pasopadrino', NULL, NULL, NULL, NULL),
	(10, 'probando api2', '1-92013', '940327883', '940327883', 'benjita23@gmail.com', 'calle muy falsa 1233', NULL, '40094', '9990', 'que pasopadrino XDDD', NULL, NULL, NULL, NULL),
	(12, 'german toro', '83344-3', '940327883', '940327883', 'guille@gmail.com', 'isla falsa 123', '', '601980', '4500', 'delicado', '3', '45', 'ASIGNADO', '1'),
	(13, 'Benjamín', '2323232', '940327883', '940327883', 'benjam@gmail.com', 'Isla adelaida 541', '', '600000', '5000', 'ninguna', '4', '44', 'ASIGNADO', '1');

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
	(46, 'Alexander', 'Salazar', 'Loaza', '2100-3', '1973-06-03', 'FEMENINO', '940327883', NULL, 'admin', '123', NULL, 'ADMINISTRADOR', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
