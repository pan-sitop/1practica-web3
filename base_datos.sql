-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2026 a las 02:58:40
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
-- Base de datos: `practica_web_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_laboratorio`
--

CREATE TABLE `equipos_laboratorio` (
  `id` int(11) NOT NULL,
  `numero_serie` varchar(50) NOT NULL,
  `nombre_equipo` varchar(100) NOT NULL,
  `tipo` enum('Computadora','Proyector','Servidor','Redes') NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `estado_operativo` tinyint(1) NOT NULL COMMENT '1 para Activo, 0 para En Reparación'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos_laboratorio`
--

INSERT INTO `equipos_laboratorio` (`id`, `numero_serie`, `nombre_equipo`, `tipo`, `fecha_adquisicion`, `estado_operativo`) VALUES
(1, '001', 'a', 'Proyector', '2026-04-08', 0),
(2, '002', 'b', 'Servidor', '2026-04-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_academicos`
--

CREATE TABLE `eventos_academicos` (
  `id` int(11) NOT NULL,
  `titulo_evento` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_evento` datetime NOT NULL,
  `modalidad` enum('Presencial','Virtual','Hibrido') NOT NULL,
  `cupo_maximo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos_academicos`
--

INSERT INTO `eventos_academicos` (`id`, `titulo_evento`, `descripcion`, `fecha_evento`, `modalidad`, `cupo_maximo`) VALUES
(1, 'Backend con MySQL', 'xdxdxd', '2026-03-30 16:00:00', 'Presencial', 50),
(2, 'Fronted vs Backend', 'xD', '2026-04-30 14:00:00', 'Virtual', 150);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos_laboratorio`
--
ALTER TABLE `equipos_laboratorio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_serie` (`numero_serie`);

--
-- Indices de la tabla `eventos_academicos`
--
ALTER TABLE `eventos_academicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos_laboratorio`
--
ALTER TABLE `equipos_laboratorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eventos_academicos`
--
ALTER TABLE `eventos_academicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
