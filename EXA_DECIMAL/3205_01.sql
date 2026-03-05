-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2026 a las 00:01:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `3205_01`
--
CREATE DATABASE IF NOT EXISTS `3205_01` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `3205_01`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condiciones`
--

CREATE TABLE `condiciones` (
  `id` int(11) NOT NULL,
  `condicion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `condiciones`
--

INSERT INTO `condiciones` (`id`, `condicion`) VALUES
(1, 'Óptimo (100%)'),
(2, 'Operativo (75%)'),
(3, 'Requiere Revisión (50%)'),
(4, 'Crítico / En reparación (25%)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cond_herra`
--

CREATE TABLE `cond_herra` (
  `id` int(11) NOT NULL,
  `condicionId` int(11) NOT NULL,
  `herramientaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `cond_herra`
--

INSERT INTO `cond_herra` (`id`, `condicionId`, `herramientaId`) VALUES
(6, 1, 11),
(7, 2, 12),
(8, 3, 13),
(9, 4, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `id` int(11) NOT NULL,
  `tools` varchar(30) NOT NULL,
  `serie` varchar(30) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`id`, `tools`, `serie`, `marca`, `estado`) VALUES
(11, 'destornillador', '#1SFD457A', 'sky', 'se encuentra en buen estado'),
(12, 'martillo', '#1SFadJi', 'star', 'es funcional'),
(13, 'alicate', '#1SFHSJshola', 'live', 'revision'),
(14, 'destornillador', '#1SFsaskaS', 'TOKITO', 'esta dañado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `condiciones`
--
ALTER TABLE `condiciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cond_herra`
--
ALTER TABLE `cond_herra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `condiciones`
--
ALTER TABLE `condiciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cond_herra`
--
ALTER TABLE `cond_herra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
