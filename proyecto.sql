-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2020 a las 09:44:40
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IDCAT` int(11) NOT NULL,
  `NOMBRE` varchar(60) DEFAULT NULL,
  `DESCRIP` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IDCAT`, `NOMBRE`, `DESCRIP`) VALUES
(1, 'aceites', 'aceites para las cocinas'),
(2, 'fideos', 'para sopas y mas'),
(3, 'bebidas', 'para calmar la sed'),
(4, 'golosinas', 'paraa endulzar la vida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IDCLI` int(11) NOT NULL,
  `NOMCLI` varchar(50) DEFAULT NULL,
  `APECLI` varchar(50) DEFAULT NULL,
  `DNI` char(8) DEFAULT NULL,
  `DIRCLI` varchar(250) DEFAULT NULL,
  `TELCLI` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IDCLI`, `NOMCLI`, `APECLI`, `DNI`, `DIRCLI`, `TELCLI`) VALUES
(1, 'ronald', 'juarez', '12345678', 'av peru 152', '987654321'),
(2, 'rember', 'ceñua', '12345678', 'av aranjuez 654', '123456789'),
(3, 'juan', 'silvera', '23456789', 'av lima 896', '123432123'),
(4, 'esteban', 'casas', '12345678', 'av lima 810', '987654321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `IDDETPED` int(11) NOT NULL,
  `CANTIDAD` decimal(6,2) DEFAULT NULL,
  `PRESUBTOTAL` decimal(6,2) DEFAULT NULL,
  `DP_PED` int(11) DEFAULT NULL,
  `DP_PROD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `IDPED` int(11) NOT NULL,
  `FECHA` date DEFAULT NULL,
  `PRECTOTAL` decimal(6,2) DEFAULT NULL,
  `PE_IDCLI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IDPRODUCTO` int(11) NOT NULL,
  `NOMBREPROD` varchar(250) DEFAULT NULL,
  `UNIDAD` char(20) DEFAULT NULL,
  `PREUNIT` decimal(6,2) DEFAULT NULL,
  `PR_IDCAT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IDPRODUCTO`, `NOMBREPROD`, `UNIDAD`, `PREUNIT`, `PR_IDCAT`) VALUES
(6, 'cil 1lt x12', 'caja', '66.00', 1),
(7, 'belini 900ml x12', 'caja', '54.00', 1),
(8, 'tria 1lt x12', 'caja', '56.00', 1),
(9, 'maximo spagueti x10kls', 'paquete', '28.00', 2),
(10, 'maximo tallarin x 10kls', 'paquete', '28.00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDUSU` int(11) NOT NULL,
  `NOMBRESUSU` varchar(50) DEFAULT NULL,
  `APELLIDOS` varchar(50) DEFAULT NULL,
  `USUARIO` char(15) DEFAULT NULL,
  `CONTRA` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDUSU`, `NOMBRESUSU`, `APELLIDOS`, `USUARIO`, `CONTRA`) VALUES
(1, 'ADMINISTRADOR', 'PRINCIPAL', 'admin', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IDCAT`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDCLI`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`IDDETPED`),
  ADD KEY `DT_PED` (`DP_PED`),
  ADD KEY `DT_PROD` (`DP_PROD`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`IDPED`),
  ADD KEY `CLI_PED` (`PE_IDCLI`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IDPRODUCTO`),
  ADD KEY `PR_CAT` (`PR_IDCAT`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUSU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IDCAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IDCLI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `IDDETPED` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `IDPED` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IDPRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUSU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `DT_PED` FOREIGN KEY (`DP_PED`) REFERENCES `pedido` (`IDPED`),
  ADD CONSTRAINT `DT_PROD` FOREIGN KEY (`DP_PROD`) REFERENCES `producto` (`IDPRODUCTO`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `CLI_PED` FOREIGN KEY (`PE_IDCLI`) REFERENCES `cliente` (`IDCLI`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `PR_CAT` FOREIGN KEY (`PR_IDCAT`) REFERENCES `categoria` (`IDCAT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
