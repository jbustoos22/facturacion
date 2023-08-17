-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2023 a las 05:04:37
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videojuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categorias` int(11) NOT NULL,
  `nombre_categorias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `nombre_categorias`) VALUES
(1, 'videojuegos'),
(2, 'consolas'),
(3, 'accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombreApellido` varchar(255) NOT NULL,
  `cedulaRif` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombreApellido`, `cedulaRif`, `direccion`, `telefono`) VALUES
(2, 'Juan Lopez', 25161251, 'Los caracaros, Naguanagua', '04241502513');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `tasausd` decimal(17,2) NOT NULL,
  `noperacion` int(11) NOT NULL,
  `ultfactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`id`, `tasausd`, `noperacion`, `ultfactura`) VALUES
(1, '27.00', 10394, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio_unit` decimal(17,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(17,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_factura`
--

INSERT INTO `detalles_factura` (`id`, `id_producto`, `precio_unit`, `cantidad`, `total`) VALUES
(1, 1, '1620.93', 2, '3241.86'),
(2, 2, '1620.93', 1, '1620.93'),
(3, 3, '540.13', 2, '1080.26'),
(4, 5, '10807.73', 2, '21615.46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

CREATE TABLE `distribuidor` (
  `id_distribuidor` int(11) NOT NULL,
  `nombre_distribuidor` varchar(255) NOT NULL,
  `rif` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distribuidor`
--

INSERT INTO `distribuidor` (`id_distribuidor`, `nombre_distribuidor`, `rif`, `direccion`, `telefono`, `email`) VALUES
(1, 'Wallmart', 789456123, 'Aragua-Maracay', '0241-8785814', 'wallmartaragua@gmail.com'),
(2, 'PcActual', 456789123, 'Carabobo-San diego', '0241-8785987', 'pcactual@gmail.com\r\n'),
(3, 'Sony', 753159987, 'Carabobo-valencia', '0241-87896321', 'sony@gmail.com'),
(4, 'xbox', 357159789, 'Aragua-maracay', '0241-87823338', 'xbox@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre_empleado` varchar(255) NOT NULL,
  `cedularif` int(11) NOT NULL,
  `fecha_ingreso` varchar(20) DEFAULT NULL,
  `cargo` int(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre_empleado`, `cedularif`, `fecha_ingreso`, `cargo`, `direccion`, `user`, `password`) VALUES
(1, 'Miguel Carrizo', 28067191, '2023-06-09', 1, 'Valencia-flor amarillo', 'mcarrizo91', '123456'),
(2, 'Jaime Bustos', 27877427, '2023-06-09', 1, 'Valencia-las acacias', 'jbustos27', '123456'),
(3, 'Jose Wildman', 28151265, '2023-06-11', 3, 'Naguanagua', 'jwildman23', '123456'),
(12, 'Juan Lopez', 12345678, '2023-06-12', 2, '123456', '123456', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encabezado_factura`
--

CREATE TABLE `encabezado_factura` (
  `id` int(11) NOT NULL,
  `fecha_emision` varchar(255) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `numero_control` int(11) NOT NULL,
  `base_imponible` decimal(17,2) NOT NULL,
  `iva` decimal(17,2) NOT NULL,
  `total_general` decimal(17,2) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encabezado_factura`
--

INSERT INTO `encabezado_factura` (`id`, `fecha_emision`, `id_cliente`, `numero_factura`, `numero_control`, `base_imponible`, `iva`, `total_general`, `id_empleado`) VALUES
(1, '11-06-2023', 2, 1, 1001, '3241.00', '518.70', '3760.56', 3),
(2, '11-06-2023', 2, 2, 1002, '1361.58', '259.35', '1620.93', 3),
(3, '11-06-2023', 2, 3, 1003, '907.42', '172.84', '1080.26', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `id_distribuidor` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `precio` decimal(17,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `id_distribuidor`, `fecha_registro`, `id_categoria`, `precio`, `stock`) VALUES
(1, 'Elden ring', 1, '2023-06-09', 1, '59.99', 10),
(2, 'Doom eternal', 1, '2023-06-09', 1, '59.99', 10),
(3, 'Mouse', 2, '2023-06-09', 3, '19.99', 10),
(4, 'Playstation 5', 3, '2023-06-09', 2, '599.99', 5),
(5, 'Xbox Series S', 4, '2023-06-09', 2, '399.99', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cargo`
--

CREATE TABLE `tipo_cargo` (
  `id_cargo` int(11) NOT NULL,
  `desc_cargo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_cargo`
--

INSERT INTO `tipo_cargo` (`id_cargo`, `desc_cargo`) VALUES
(1, 'Administrador'),
(2, 'Supervisor'),
(3, 'Vendedor'),
(4, 'Dpt. Administracion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ultfactura` (`ultfactura`);

--
-- Indices de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD PRIMARY KEY (`id_distribuidor`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `cargo` (`cargo`);

--
-- Indices de la tabla `encabezado_factura`
--
ALTER TABLE `encabezado_factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `numero_factura` (`numero_factura`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_distribuidor` (`id_distribuidor`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `tipo_cargo`
--
ALTER TABLE `tipo_cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  MODIFY `id_distribuidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `encabezado_factura`
--
ALTER TABLE `encabezado_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_cargo`
--
ALTER TABLE `tipo_cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `factura` FOREIGN KEY (`ultfactura`) REFERENCES `detalles_factura` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD CONSTRAINT `id_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `id_cargo` FOREIGN KEY (`cargo`) REFERENCES `tipo_cargo` (`id_cargo`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `encabezado_factura`
--
ALTER TABLE `encabezado_factura`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION,
  ADD CONSTRAINT `id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE NO ACTION,
  ADD CONSTRAINT `nro_factura` FOREIGN KEY (`numero_factura`) REFERENCES `detalles_factura` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categorias`) ON DELETE NO ACTION,
  ADD CONSTRAINT `id_distribuidor` FOREIGN KEY (`id_distribuidor`) REFERENCES `distribuidor` (`id_distribuidor`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
