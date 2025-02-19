-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2025 a las 22:34:35
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
-- Base de datos: `construcciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `construccion`
--

CREATE TABLE `construccion` (
  `id` int(11) NOT NULL,
  `certificado` varchar(250) NOT NULL,
  `costo_a_pagar` decimal(22,0) NOT NULL,
  `identificar` varchar(200) NOT NULL,
  `venta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `construccion`
--

INSERT INTO `construccion` (`id`, `certificado`, `costo_a_pagar`, `identificar`, `venta`) VALUES
(24, 'certificado', 340000, 'casa para el dueño de tiendaNube', 425000.00),
(25, 'vos sabes', 100045554, 'juanceto prueba', 99999999.99),
(26, 'juanceto prueba', 84566909, 'Dueño tiendaNube', 99999999.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos`
--

CREATE TABLE `costos` (
  `id` int(11) NOT NULL,
  `id_construccion` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `valor` decimal(22,0) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `costos`
--

INSERT INTO `costos` (`id`, `id_construccion`, `descripcion`, `valor`, `fecha_creacion`) VALUES
(3, 24, 'Tejas', 140000, '2025-02-19 20:44:25'),
(4, 24, 'bloques', 200000, '2025-02-19 20:44:25'),
(5, 25, 'prueba juan', 33333, '2025-02-19 21:30:59'),
(6, 25, 'bloques', 100000000, '2025-02-19 21:30:59'),
(7, 25, 'prueba juan', 5555, '2025-02-19 21:30:59'),
(8, 25, 'juanjuan', 6666, '2025-02-19 21:30:59'),
(9, 26, 'Tejas', 40005677, '2025-02-19 21:33:21'),
(10, 26, 'no se', 40005677, '2025-02-19 21:33:21'),
(11, 26, 'quii', 4555555, '2025-02-19 21:33:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'juaniemilio05@gmail.com', '$2y$10$Jn15YCotpUARuXHDY0In1.CfwoEvYJfPu01aijf0Ih77C5Xsy.yIa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `construccion`
--
ALTER TABLE `construccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `costos`
--
ALTER TABLE `costos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_construccion` (`id_construccion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `construccion`
--
ALTER TABLE `construccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `costos`
--
ALTER TABLE `costos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `costos`
--
ALTER TABLE `costos`
  ADD CONSTRAINT `costos_ibfk_1` FOREIGN KEY (`id_construccion`) REFERENCES `construccion` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
