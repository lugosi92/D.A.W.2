-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2024 a las 19:15:14
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Cambiar el conjunto de caracteres a utf8mb4
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `test`

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `usuario`

CREATE TABLE `usuario` (
  `idUsuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `examen`

CREATE TABLE `examen` (
  `idExamen` int NOT NULL AUTO_INCREMENT,
  `idUsuario` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nota` decimal(5,2) NOT NULL,
  PRIMARY KEY (`idExamen`),
  FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `pregunta`

CREATE TABLE `pregunta` (
  `idPreguntas` int NOT NULL AUTO_INCREMENT,
  `enunciado` varchar(255) NOT NULL,
  PRIMARY KEY (`idPreguntas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `respuesta`

CREATE TABLE `respuesta` (
  `idRespuesta` int NOT NULL AUTO_INCREMENT,
  `idPregunta` int NOT NULL,
  `texto_respuesta` enum('SI','NO') NOT NULL,
  `correcto` tinyint(1) NOT NULL,
  PRIMARY KEY (`idRespuesta`),
  FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (`idPreguntas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `examen_respuesta`

CREATE TABLE `examen_respuesta` (
  `idExamen_Preguntas` int NOT NULL AUTO_INCREMENT,
  `idExamen` int NOT NULL,
  `idPreguntas` int NOT NULL,
  `opciones_respondidas` int NOT NULL,
  PRIMARY KEY (`idExamen_Preguntas`),
  FOREIGN KEY (`idExamen`) REFERENCES `examen` (`idExamen`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`idPreguntas`) REFERENCES `pregunta` (`idPreguntas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `resultado`

CREATE TABLE `resultado` (
  `idResultado` int NOT NULL AUTO_INCREMENT,
  `idUsuario` varchar(50) NOT NULL,
  `puntuaje` decimal(5,2) NOT NULL,
  PRIMARY KEY (`idResultado`),
  FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

COMMIT;

-- Reestablecer configuraciones de carácter
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
