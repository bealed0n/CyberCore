-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2023 a las 02:55:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cybercore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carrito`
--

CREATE TABLE `tb_carrito` (
  `id` int(11) NOT NULL,
  `id_pedido` varchar(512) DEFAULT NULL,
  `producto` varchar(512) DEFAULT NULL,
  `detalle` varchar(512) DEFAULT NULL,
  `cantidad` varchar(512) DEFAULT NULL,
  `precio_unitario` varchar(512) DEFAULT NULL,
  `precio_total` varchar(512) DEFAULT NULL,
  `user_creacion` varchar(512) DEFAULT NULL,
  `user_actualizacion` varchar(512) DEFAULT NULL,
  `user_eliminacion` varchar(512) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_carrito`
--

INSERT INTO `tb_carrito` (`id`, `id_pedido`, `producto`, `detalle`, `cantidad`, `precio_unitario`, `precio_total`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(7, '1', 'Guitarra electrica', '70x40', '1', '99000', '99000', NULL, NULL, NULL, '2023-05-13 11:13:06', NULL, NULL, '1'),
(8, '2', 'bateria electrica', 'gigante', '1', '444990', '444990', NULL, NULL, NULL, '2023-05-13 11:48:22', NULL, NULL, '1'),
(9, '2', 'cables xml', 'ninguno', '3', '6500', '19500', NULL, NULL, NULL, '2023-05-13 11:48:48', NULL, NULL, '1'),
(10, '3', 'dgdf', 'gdfg', '34', '34', '1156', NULL, NULL, NULL, '2023-05-13 11:56:10', '2023-05-13 11:56:12', '2023-05-13 11:58:02', '0'),
(11, '3', 'fsdf', 'fsdfsdf', '23', '3233', '74359', NULL, NULL, NULL, '2023-05-13 11:57:45', '2023-05-13 11:57:46', '2023-05-13 11:58:02', '0'),
(12, '3', 'dsfsdf', 'sdfsdf', '3434', '3434', '11792356', NULL, NULL, NULL, '2023-05-13 11:58:01', NULL, '2023-05-13 11:58:02', '0'),
(13, '3', 'Mesa de sonido', 'pioner', '2', '300990', '601980', NULL, NULL, NULL, '2023-05-13 05:33:21', NULL, NULL, '1'),
(14, '4', 'guitarra acustica', 'madera de roble', '1', '600000', '600000', NULL, NULL, NULL, '2023-05-13 05:36:45', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_delivery`
--

CREATE TABLE `tb_delivery` (
  `id_delivery` int(11) NOT NULL,
  `id_pedido` varchar(512) DEFAULT NULL,
  `id_carrito` varchar(512) DEFAULT NULL,
  `id_repartidor_asignado` varchar(512) DEFAULT NULL,
  `estado_delivery` varchar(512) DEFAULT NULL,
  `user_creacion` varchar(512) DEFAULT NULL,
  `user_actualizacion` varchar(512) DEFAULT NULL,
  `user_eliminacion` varchar(512) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `id_pedido` int(11) NOT NULL,
  `nombre_cliente` varchar(512) DEFAULT NULL,
  `rut_cliente` varchar(512) DEFAULT NULL,
  `celular_cliente` varchar(512) DEFAULT NULL,
  `celular_referencia_cliente` varchar(512) DEFAULT NULL,
  `email_cliente` varchar(512) DEFAULT NULL,
  `direccion_cliente` varchar(512) DEFAULT NULL,
  `id_direccion_cliente` varchar(512) DEFAULT NULL,
  `costo_pedido` varchar(512) DEFAULT NULL,
  `costo_delivery` varchar(512) DEFAULT NULL,
  `obs` varchar(512) DEFAULT NULL,
  `id_carrito` varchar(512) DEFAULT NULL,
  `id_repartidor_asignado` varchar(512) DEFAULT NULL,
  `estado_pedido` varchar(512) DEFAULT NULL,
  `user_creacion` varchar(512) DEFAULT NULL,
  `user_actualizacion` varchar(512) DEFAULT NULL,
  `user_eliminacion` varchar(512) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`id_pedido`, `nombre_cliente`, `rut_cliente`, `celular_cliente`, `celular_referencia_cliente`, `email_cliente`, `direccion_cliente`, `id_direccion_cliente`, `costo_pedido`, `costo_delivery`, `obs`, `id_carrito`, `id_repartidor_asignado`, `estado_pedido`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(4, 'prdrito', '1-921', '940327883', '940327883', 'pedrito@gmail.com', 'isla walton 543', '', '99000', '4990', 'objeto delicado', '1', '44', 'PEDIDO FINALIZADO', NULL, NULL, NULL, '2023-05-13 11:14:15', NULL, NULL, '1'),
(5, 'matias del rio', '494-2', '940327883', '992939323', 'matiaselmismisimo@gmail.com', 'sucasa 123', '', '464490', '7000', 'arbol fuera de casa', '2', '44', 'PEDIDO FINALIZADO', NULL, NULL, NULL, '2023-05-13 11:51:27', NULL, NULL, '1'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'probando api', '1-9201', '940327883', '940327883', 'benjita@gmail.com', 'calle muy falsa 123', NULL, NULL, '9990', 'que pasopadrino', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'probando api2', '1-92013', '940327883', '940327883', 'benjita23@gmail.com', 'calle muy falsa 1233', NULL, '40094', '9990', 'que pasopadrino XDDD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'german toro', '83344-3', '940327883', '940327883', 'guille@gmail.com', 'isla falsa 123', '', '601980', '4500', 'delicado', '3', '45', 'ASIGNADO', NULL, NULL, NULL, '2023-05-13 05:34:21', NULL, NULL, '1'),
(13, 'Benjamín', '2323232', '940327883', '940327883', 'benjam@gmail.com', 'Isla adelaida 541', '', '600000', '5000', 'ninguna', '4', '44', 'ASIGNADO', NULL, NULL, NULL, '2023-05-13 05:37:17', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ubicacion`
--

CREATE TABLE `tb_ubicacion` (
  `id` int(11) NOT NULL,
  `email` varchar(512) DEFAULT NULL,
  `latitud` varchar(512) DEFAULT NULL,
  `longitud` varchar(512) DEFAULT NULL,
  `estado_delivery` varchar(512) DEFAULT NULL,
  `cargo` varchar(512) DEFAULT NULL,
  `nombre` varchar(512) DEFAULT NULL,
  `user_creacion` varchar(512) DEFAULT NULL,
  `user_actualizacion` varchar(512) DEFAULT NULL,
  `user_eliminacion` varchar(512) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_ubicacion`
--

INSERT INTO `tb_ubicacion` (`id`, `email`, `latitud`, `longitud`, `estado_delivery`, `cargo`, `nombre`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(10, 'elpepe@gmail.com', '0', '0', 'LIBRE', 'ADMINISTRADOR', 'Jose Pepe Grillo', NULL, NULL, NULL, '2023-05-12 11:07:45', NULL, NULL, '1'),
(11, 'bas@gmail.com', '0', '0', 'LIBRE', 'REPARTIDOR', 'Bastian Landaeta Galaz', NULL, NULL, NULL, '2023-05-12 11:35:29', NULL, NULL, '1'),
(12, 'bas@gmail.com', '0', '0', 'LIBRE', 'REPARTIDOR', 'bastian Landaeta Galaz', NULL, NULL, NULL, '2023-05-12 11:39:31', NULL, NULL, '1'),
(13, 'benjaminalexander2002@gmail.com', '0', '0', 'LIBRE', 'REPARTIDOR', 'Bastian Landaeta Loyola', NULL, NULL, NULL, '2023-05-12 11:47:35', NULL, NULL, '1'),
(14, 'elpepe1@gmail.com', '0', '0', 'LIBRE', 'REPARTIDOR', 'elpepe profesor decounter', NULL, NULL, NULL, '2023-05-13 11:52:16', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(512) DEFAULT NULL,
  `ap_paterno` varchar(512) DEFAULT NULL,
  `ap_materno` varchar(512) DEFAULT NULL,
  `rut` varchar(512) DEFAULT NULL,
  `fecha_nacimiento` varchar(512) DEFAULT NULL,
  `sexo` varchar(512) DEFAULT NULL,
  `celular` varchar(512) DEFAULT NULL,
  `foto_perfil` text DEFAULT NULL,
  `email` varchar(512) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `token` varchar(512) DEFAULT NULL,
  `cargo` varchar(512) DEFAULT NULL,
  `user_creacion` varchar(512) DEFAULT NULL,
  `user_actualizacion` varchar(512) DEFAULT NULL,
  `user_eliminacion` varchar(512) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `rut`, `fecha_nacimiento`, `sexo`, `celular`, `foto_perfil`, `email`, `password`, `token`, `cargo`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'benja', 'elguru', 'alumnito1', '1-9', '2002-06-03', 'MASCULINO', '940327883', NULL, 'benj.loyola@duocuc.cl', '123', NULL, 'ADMINISTRADOR', NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(41, 'Jose', 'Pepe', 'Grillo', '1-3', '1973-06-03', 'HOMBRE', '965849858', NULL, 'elpepe@gmail.com', '123', NULL, 'ADMINISTRADOR', NULL, NULL, NULL, '2023-05-12 11:07:45', NULL, NULL, '1'),
(44, 'Bastian', 'Landaeta', 'Loyola', '1212121', '1992-03-09', 'HOMBRE', '940327883', NULL, 'benjaminalexander2002@gmail.com', '123', NULL, 'REPARTIDOR', NULL, NULL, NULL, '2023-05-12 11:47:35', NULL, NULL, '1'),
(45, 'elpepe', 'profesor', 'decounter', '34949934-2', '1950-04-04', 'MASCULINO', '940327883', NULL, 'elpepe1@gmail.com', '123', NULL, 'REPARTIDOR', NULL, NULL, NULL, '2023-05-13 11:52:16', NULL, NULL, '1'),
(46, 'Alexander', 'Salazar', 'Loaza', '2100-3', '1973-06-03', 'FEMENINO', '940327883', NULL, 'admin@gmail.com', '123', NULL, 'ADMINISTRADOR', NULL, NULL, NULL, NULL, NULL, NULL, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_delivery`
--
ALTER TABLE `tb_delivery`
  ADD PRIMARY KEY (`id_delivery`);

--
-- Indices de la tabla `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `tb_ubicacion`
--
ALTER TABLE `tb_ubicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_delivery`
--
ALTER TABLE `tb_delivery`
  MODIFY `id_delivery` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_ubicacion`
--
ALTER TABLE `tb_ubicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
