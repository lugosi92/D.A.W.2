CREATE DATABASE IF NOT EXISTS noticias2;
USE noticias2;


-- ----------------------CLIENTE----------------------------------
CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserta clientes en la tabla `cliente`
INSERT INTO `cliente` (`cliente_id`, `nombre`) VALUES
(1, 'Cliente 1'),
(2, 'Cliente 2');

-- ----------------------CATEGORIAS----------------------------------
CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categorias` (`nombre`) VALUES
('Promociones'),
('Locales Comerciales'),
('Nueva Construccion'),
('Pisos'),
('Naves industriales'),
('Terrenos');

-- ----------------------PUBLICACIONES----------------------------------
CREATE TABLE `publicaciones` (
  `publicacion_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `cliente_id` int(11) NOT NULL,
  PRIMARY KEY (`publicacion_id`),
  FOREIGN KEY (`cliente_id`) REFERENCES `cliente`(`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserta publicaciones
INSERT INTO `publicaciones` (`titulo`, `texto`, `imagen`, `fecha_creacion`, `cliente_id`) VALUES
('NOTICIAS DE PISOS', 'LA SUBIDA DEL ALQUILER Y LA ENTRADA DEL EURO DIGITAL EN EURPOA', 'img/Captura de pantalla 2024-09-26 093735.png', '2025-04-07 09:56:42', 1),
('CASAS EN EUROPA', 'Las casas en Europa dependen de la oferta y demanda.', 'img/Captura de pantalla 2024-09-26 093735.png', '2025-04-07 10:01:21', 2);

-- ----------------------PUBLICACIONES CATEGORIAS----------------------------------
CREATE TABLE `publicaciones_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publicacion_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`publicacion_id`) REFERENCES `publicaciones`(`publicacion_id`),
  FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserta publicaciones_categorias
INSERT INTO `publicaciones_categorias` (`publicacion_id`, `categoria_id`) VALUES
(5, 1),
(5, 4),
(6, 2),
(6, 3);
