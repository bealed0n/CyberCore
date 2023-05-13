-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cyberCore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carrito`
--

CREATE TABLE `tb_carrito` (
  `id` int(11) NOT NULL,
  `id_pedido` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `producto` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalle` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio_unitario` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio_total` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_delivery`
--

CREATE TABLE `tb_delivery` (
  `id_delivery` int(11) NOT NULL,
  `id_pedido` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_carrito` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_repartidor_asignado` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_delivery` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mis_direcciones`
--

CREATE TABLE `tb_mis_direcciones` (
  `id` int(11) NOT NULL,
  `email` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_direccion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `referencia` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
--

CREATE TABLE `tb_repartidor` (
  `id` int(11) NOT NULL,
  `nombres` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ap_paterno` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ap_materno` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rut` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `token` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `id_pedido` int(11) NOT NULL,
  `nombre_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ci_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular_referencia_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_direccion_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `costo_pedido` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `costo_delivery` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `obs` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_carrito` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_repartidor_asignado` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_pedido` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE `tb_ubicacion` (
  `id` int(11) NOT NULL,
  `email` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitud` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitud` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_delivery` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_paterno` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_materno` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rut` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_perfil` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
ALTER TABLE `tb_carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_delivery`
--
ALTER TABLE `tb_delivery`
  ADD PRIMARY KEY (`id_delivery`);

--
-- Indices de la tabla `tb_mis_direcciones`
--
ALTER TABLE `tb_mis_direcciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_repartdpres`
--
ALTER TABLE `tb_repartidor`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_delivery`
--
ALTER TABLE `tb_delivery`
  MODIFY `id_delivery` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_mis_direcciones`
--
ALTER TABLE `tb_mis_direcciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_repartidor`
--
ALTER TABLE `tb_repartidor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_ubicacion`
--
ALTER TABLE `tb_ubicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
