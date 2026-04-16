-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2026 a las 20:53:43
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
-- Base de datos: `perfumeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `email`, `telefono`) VALUES
(2, 'Ana', 'Gomez', 'ana@gmail.com', '222222'),
(3, 'Luis', 'Martinez', 'luis@gmail.com', '333333'),
(4, 'Sofia', 'Lopez', 'sofia@gmail.com', '444444'),
(5, 'Pedro', 'Diaz', 'pedro@gmail.com', '555555'),
(6, 'Maria', 'Fernandez', 'maria@gmail.com', '666666'),
(7, 'Lucas', 'Torres', 'lucas@gmail.com', '777777'),
(8, 'Valentina', 'Ruiz', 'valen@gmail.com', '888888'),
(9, 'Diego', 'Sosa', 'diego@gmail.com', '999999'),
(10, 'Carla', 'Mendez', 'carla@gmail.com', '101010'),
(11, 'Leon', 'Veraldi', 'leon1509veraldirita@gmail.com', '1133293822');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfumes`
--

CREATE TABLE `perfumes` (
  `id_perfume` int(11) NOT NULL,
  `nombre_perfume` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfumes`
--

INSERT INTO `perfumes` (`id_perfume`, `nombre_perfume`, `precio`, `stock`, `id_proveedor`) VALUES
(3, 'Perfume 3', 9000.00, 20, 3),
(4, 'Perfume 4', 15000.00, 5, 4),
(5, 'Perfume 5', 11000.00, 8, 5),
(6, 'Perfume 6', 13000.00, 12, 6),
(7, 'Perfume 7', 14000.00, 7, 7),
(8, 'Perfume 8', 8000.00, 25, 8),
(9, 'Perfume 9', 9500.00, 18, 9),
(10, 'Perfume 10', 16000.00, 6, 10),
(11, 'Asad', 50000.00, 10, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `email`, `direccion`) VALUES
(2, 'Proveedor B', 'provB@gmail.com', 'Calle 2'),
(3, 'Proveedor C', 'provC@gmail.com', 'Calle 3'),
(4, 'Proveedor D', 'provD@gmail.com', 'Calle 4'),
(5, 'Proveedor E', 'provE@gmail.com', 'Calle 5'),
(6, 'Proveedor F', 'provF@gmail.com', 'Calle 6'),
(7, 'Proveedor G', 'provG@gmail.com', 'Calle 7'),
(8, 'Proveedor H', 'provH@gmail.com', 'Calle 8'),
(9, 'Proveedor I', 'provI@gmail.com', 'Calle 9'),
(10, 'Proveedor J', 'provJ@gmail.com', 'Calle 10'),
(11, 'Proveedor Z', 'proveedor@gmail.com', 'trona 7689');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_perfume` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `fecha`, `id_cliente`, `id_perfume`, `total`) VALUES
(4, '2024-01-04', 4, 4, 15000.00),
(5, '2024-01-05', 5, 5, 11000.00),
(6, '2024-01-06', 6, 6, 13000.00),
(7, '2024-01-07', 7, 7, 14000.00),
(8, '2024-01-08', 8, 8, 8000.00),
(9, '2024-01-09', 9, 9, 9500.00),
(10, '2024-01-10', 10, 10, 16000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `perfumes`
--
ALTER TABLE `perfumes`
  ADD PRIMARY KEY (`id_perfume`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_perfume` (`id_perfume`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `perfumes`
--
ALTER TABLE `perfumes`
  MODIFY `id_perfume` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perfumes`
--
ALTER TABLE `perfumes`
  ADD CONSTRAINT `perfumes_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_perfume`) REFERENCES `perfumes` (`id_perfume`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
