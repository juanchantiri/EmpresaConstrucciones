-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2025 a las 21:13:15
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
  `costo` decimal(22,0) NOT NULL,
  `certificado` varchar(250) NOT NULL,
  `costo_a_pagar` decimal(22,0) NOT NULL,
  `identificar` varchar(200) NOT NULL,
  `venta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `construccion`
--

INSERT INTO `construccion` (`id`, `costo`, `certificado`, `costo_a_pagar`, `identificar`, `venta`) VALUES
(1, 89000001, 'casa del dueño de tiendanube uno de los unicornios argentinos', 30001, 'dueño tienda nube', 0.00),
(2, 15000000, 'no se que se pone en el certificado', 15004564, 'casa para Carlos Perez', 0.00),
(6, 1234232432, 'cada 2 meses', 5369889898, 'Casa para Marcelo Fabian Chantiri', 0.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `construccion`
--
ALTER TABLE `construccion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `construccion`
--
ALTER TABLE `construccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
