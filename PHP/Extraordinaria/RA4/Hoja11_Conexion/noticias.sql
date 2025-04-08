-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2025 a las 20:56:45
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
-- Base de datos: `noticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Array'),
(2, 'Array'),
(3, 'Array'),
(4, 'Array'),
(5, 'Array'),
(6, 'Array');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `categorias` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `texto`, `categorias`, `imagen`, `fecha_creacion`) VALUES
(1, 'HAHAHHHHHHAAAAAAAAAAAAA', ' HAHAHHHHHHAAAAAAAAAAAAAHAHAHHHHHHAAAAAAAAAAAAAHAHAHHHHHHAAAAAAAAAAAAAHAHAHHHHHHAAAAAAAAAAAAA', '', 'img/K.png', '2025-04-01 18:45:59'),
(2, 'HAHAHHHHHHAAAAAAAAAAAAA', ' HAHAHHHHHHAAAAAAAAAAAAAHAHAHHHHHHAAAAAAAAAAAAAHAHAHHHHHHAAAAAAAAAAAAAHAHAHHHHHHAAAAAAAAAAAAA', '', 'img/K.png', '2025-04-01 18:46:42'),
(3, 'HAHAHHHHHHAAAAAAAAAAAAA', ' HAHAHHHHHHAAAAAAAAAAAAAHAHAHHHHHHAAAAAAAAAAAAAHAHAHHHHHHAAAAAAAAAAAAAHAHAHHHHHHAAAAAAAAAAAAAHAHAHHHHHHAAAAAAAAAAAAAv', '', 'img/K.png', '2025-04-01 18:47:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones_categorias`
--

CREATE TABLE `publicaciones_categorias` (
  `id` int(11) NOT NULL,
  `publicacion_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones_categorias`
--

INSERT INTO `publicaciones_categorias` (`id`, `publicacion_id`, `categoria_id`) VALUES
(1, 1, NULL),
(2, 1, NULL),
(3, 2, NULL),
(4, 2, NULL),
(5, 3, NULL),
(6, 3, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones_categorias`
--
ALTER TABLE `publicaciones_categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publicacion_id` (`publicacion_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `publicaciones_categorias`
--
ALTER TABLE `publicaciones_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicaciones_categorias`
--
ALTER TABLE `publicaciones_categorias`
  ADD CONSTRAINT `publicaciones_categorias_ibfk_1` FOREIGN KEY (`publicacion_id`) REFERENCES `publicaciones` (`id`),
  ADD CONSTRAINT `publicaciones_categorias_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
