-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 14-09-2024 a las 22:50:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basedatosnvs`
--
CREATE DATABASE IF NOT EXISTS `basedatosnvs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `basedatosnvs`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `idAdministrador` int(5) NOT NULL,
  `documentoAdministrador` varchar(11) NOT NULL,
  `pf_fk_tdoc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
CREATE TABLE `calificacion` (
  `idCliente` int(5) NOT NULL,
  `idProducto` int(5) NOT NULL,
  `numeroCalificacion` float NOT NULL,
  `comentarioCalificacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacionfinal`
--

DROP TABLE IF EXISTS `calificacionfinal`;
CREATE TABLE `calificacionfinal` (
  `idProducto` int(5) NOT NULL,
  `totalCalificacion` float NOT NULL,
  `PromedioAceptacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicasfis`
--

DROP TABLE IF EXISTS `caracteristicasfis`;
CREATE TABLE `caracteristicasfis` (
  `idConsola` int(5) NOT NULL,
  `color` varchar(20) NOT NULL,
  `tipoControles` varchar(20) NOT NULL,
  `controlesIncluidos` varchar(20) NOT NULL,
  `controlesSoporta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicastec`
--

DROP TABLE IF EXISTS `caracteristicastec`;
CREATE TABLE `caracteristicastec` (
  `idConsola` int(5) NOT NULL,
  `tipoProcesador` varchar(100) NOT NULL,
  `resolucion` varchar(30) NOT NULL,
  `plataforma` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idCliente` int(5) NOT NULL,
  `contrasenaCliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `contrasenaCliente`) VALUES
(2, 'pollitopio'),
(10, 'vacalechera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conectividad`
--

DROP TABLE IF EXISTS `conectividad`;
CREATE TABLE `conectividad` (
  `idConsola` int(5) NOT NULL,
  `fuenteAlimentacion` varchar(100) NOT NULL,
  `opcionConectividad` varchar(200) NOT NULL,
  `tipoPuertos` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conectividadconsola`
--

DROP TABLE IF EXISTS `conectividadconsola`;
CREATE TABLE `conectividadconsola` (
  `idConectividad` int(5) NOT NULL,
  `fuenteAlimentacion` varchar(200) NOT NULL,
  `opcionConectividad` varchar(200) NOT NULL,
  `TiposPuetos` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consola`
--

DROP TABLE IF EXISTS `consola`;
CREATE TABLE `consola` (
  `idConsola` int(5) NOT NULL,
  `sobreConsola` varchar(300) NOT NULL,
  `caracteristicasConsola` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrollador`
--

DROP TABLE IF EXISTS `desarrollador`;
CREATE TABLE `desarrollador` (
  `idDesarrollador` varchar(20) NOT NULL,
  `estadoDesarrolador` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `desarrollador`
--

INSERT INTO `desarrollador` (`idDesarrollador`, `estadoDesarrolador`) VALUES
('Nintendo', 0),
('PlayStation', 1),
('Xbox', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

DROP TABLE IF EXISTS `detallefactura`;
CREATE TABLE `detallefactura` (
  `fk_pk_Factura` int(5) NOT NULL,
  `fk_pk_Producto` int(5) NOT NULL,
  `cantidadProducto` int(5) NOT NULL,
  `valorUnitarioProducto` float NOT NULL,
  `ivaProducto` float NOT NULL,
  `totalProducto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimensiones`
--

DROP TABLE IF EXISTS `dimensiones`;
CREATE TABLE `dimensiones` (
  `idConsola` int(5) NOT NULL,
  `ancho` varchar(50) NOT NULL,
  `alto` varchar(50) NOT NULL,
  `fondo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE `direccion` (
  `fk_pk_Cliente` int(5) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `complemento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

DROP TABLE IF EXISTS `envios`;
CREATE TABLE `envios` (
  `fk_pk_Factura` int(5) NOT NULL,
  `tiempoEstimado` varchar(20) NOT NULL,
  `observaciones` varchar(50) NOT NULL,
  `idEstadoEnvio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoenvio`
--

DROP TABLE IF EXISTS `estadoenvio`;
CREATE TABLE `estadoenvio` (
  `idEstadoEnvio` varchar(20) NOT NULL,
  `estadoEnvio` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `idFactura` int(5) NOT NULL,
  `fechaFactura` date NOT NULL,
  `iva` float NOT NULL,
  `base` float NOT NULL,
  `totalCompra` float NOT NULL,
  `descontarPuntos` float NOT NULL,
  `descuentoGenerado` float NOT NULL,
  `idCliente` int(5) NOT NULL,
  `idPuntosCliente` int(5) NOT NULL,
  `idFormaPago` varchar(20) NOT NULL,
  `fk_pk_direccion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formapago`
--

DROP TABLE IF EXISTS `formapago`;
CREATE TABLE `formapago` (
  `idFormaPago` varchar(20) NOT NULL,
  `estadoMetodoPago` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formapago`
--

INSERT INTO `formapago` (`idFormaPago`, `estadoMetodoPago`) VALUES
('PSE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generojuego`
--

DROP TABLE IF EXISTS `generojuego`;
CREATE TABLE `generojuego` (
  `idGeneroJuego` varchar(20) NOT NULL,
  `estadoGeneroJuego` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generojuego`
--

INSERT INTO `generojuego` (`idGeneroJuego`, `estadoGeneroJuego`) VALUES
('accion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialpuntos`
--

DROP TABLE IF EXISTS `historialpuntos`;
CREATE TABLE `historialpuntos` (
  `pk_fk_Factura` int(5) NOT NULL,
  `idCliente` int(5) NOT NULL,
  `puntosGenerados` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

DROP TABLE IF EXISTS `juego`;
CREATE TABLE `juego` (
  `idJuego` int(5) NOT NULL,
  `anoLanzamineto` date NOT NULL,
  `idPlataforma` varchar(20) NOT NULL,
  `idLenguaje` varchar(20) NOT NULL,
  `idTipoJuego` varchar(20) NOT NULL,
  `idGeneroJuego` varchar(20) NOT NULL,
  `idDesarrollador` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lenguaje`
--

DROP TABLE IF EXISTS `lenguaje`;
CREATE TABLE `lenguaje` (
  `idLenguaje` varchar(20) NOT NULL,
  `estadoLenguaje` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lenguaje`
--

INSERT INTO `lenguaje` (`idLenguaje`, `estadoLenguaje`) VALUES
('Español', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `idMarca` varchar(20) NOT NULL,
  `estado_marca` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `estado_marca`) VALUES
('Nintendo', 0),
('Nintendo Cube', 1),
('PlayStation', 1),
('Xbox', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

DROP TABLE IF EXISTS `plataforma`;
CREATE TABLE `plataforma` (
  `idPlataforma` varchar(20) NOT NULL,
  `estadoPlataforma` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`idPlataforma`, `estadoPlataforma`) VALUES
('Nintendo Switch', 1),
('Playstaion 4', 1),
('PlayStation 5', 1),
('Xbox One', 1),
('Xbox Series S', 1),
('Xbox Series X', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idProducto` int(5) NOT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `precioProducto` float NOT NULL,
  `ivaProducto` float NOT NULL,
  `garantiaProducto` varchar(40) NOT NULL,
  `idTipoProducto` varchar(20) NOT NULL,
  `idMarca` varchar(20) NOT NULL,
  `idAdministrador_crear` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntoscliente`
--

DROP TABLE IF EXISTS `puntoscliente`;
CREATE TABLE `puntoscliente` (
  `idPuntosCliente` int(5) NOT NULL,
  `totalPuntos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `idRol` int(5) NOT NULL,
  `descRol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuario`
--

DROP TABLE IF EXISTS `roles_usuario`;
CREATE TABLE `roles_usuario` (
  `usuarioId` int(5) NOT NULL,
  `usuarioRol` int(5) NOT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

DROP TABLE IF EXISTS `soporte`;
CREATE TABLE `soporte` (
  `idCliente` int(5) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `apellidoUsuario` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `pqrs` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipojuego`
--

DROP TABLE IF EXISTS `tipojuego`;
CREATE TABLE `tipojuego` (
  `idTipoJuego` varchar(20) NOT NULL,
  `estadoTipoJuego` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

DROP TABLE IF EXISTS `tipoproducto`;
CREATE TABLE `tipoproducto` (
  `idTipoProducto` varchar(20) NOT NULL,
  `estado_tipopro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`idTipoProducto`, `estado_tipopro`) VALUES
('Consola', 1),
('Videojuego', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
CREATE TABLE `tipo_documento` (
  `t_doc` varchar(10) NOT NULL,
  `desc_tdoc` varchar(30) NOT NULL,
  `estado_tdoc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`t_doc`, `desc_tdoc`, `estado_tdoc`) VALUES
('CC', 'Cedula Ciudadania', 1),
('TI', 'Tarjeta de Identidad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(5) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `senombreUsuario` varchar(20) DEFAULT NULL,
  `apellidoUsuario` varchar(20) NOT NULL,
  `seapellidoUsuario` varchar(20) DEFAULT NULL,
  `correoUsuario` varchar(50) NOT NULL,
  `celularUsuario` varchar(50) NOT NULL,
  `contrasenaUsuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `senombreUsuario`, `apellidoUsuario`, `seapellidoUsuario`, `correoUsuario`, `celularUsuario`, `contrasenaUsuario`) VALUES
(2, 'Andrey ', 'Dilan', 'Bohorquez', 'RIveros', 'RIverosAlgo@gmail.com', '3017820766', 'jsaddnsajdkas'),
(10, 'kevin', 'STIVEN', 'muñoz ', 'castelllanos', 'ksmc825@gmail.com', '3017820766', 'P?V??????$?W?^?:');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`,`pf_fk_tdoc`),
  ADD UNIQUE KEY `idAdministrador` (`idAdministrador`),
  ADD KEY `administrador_ibfk_2` (`pf_fk_tdoc`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idCliente`,`idProducto`),
  ADD UNIQUE KEY `idCliente` (`idCliente`),
  ADD UNIQUE KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `calificacionfinal`
--
ALTER TABLE `calificacionfinal`
  ADD PRIMARY KEY (`idProducto`),
  ADD UNIQUE KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `caracteristicasfis`
--
ALTER TABLE `caracteristicasfis`
  ADD PRIMARY KEY (`idConsola`),
  ADD UNIQUE KEY `idConsola` (`idConsola`);

--
-- Indices de la tabla `caracteristicastec`
--
ALTER TABLE `caracteristicastec`
  ADD PRIMARY KEY (`idConsola`,`plataforma`),
  ADD UNIQUE KEY `idConsola` (`idConsola`),
  ADD KEY `caracteristicastec_ibfk_2` (`plataforma`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `conectividad`
--
ALTER TABLE `conectividad`
  ADD PRIMARY KEY (`idConsola`),
  ADD UNIQUE KEY `idConsola` (`idConsola`);

--
-- Indices de la tabla `conectividadconsola`
--
ALTER TABLE `conectividadconsola`
  ADD PRIMARY KEY (`idConectividad`),
  ADD UNIQUE KEY `idConectividad` (`idConectividad`);

--
-- Indices de la tabla `consola`
--
ALTER TABLE `consola`
  ADD PRIMARY KEY (`idConsola`),
  ADD UNIQUE KEY `idConsola` (`idConsola`);

--
-- Indices de la tabla `desarrollador`
--
ALTER TABLE `desarrollador`
  ADD PRIMARY KEY (`idDesarrollador`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`fk_pk_Factura`,`fk_pk_Producto`),
  ADD KEY `fk_pk_Producto` (`fk_pk_Producto`),
  ADD KEY `idFactura` (`fk_pk_Factura`);

--
-- Indices de la tabla `dimensiones`
--
ALTER TABLE `dimensiones`
  ADD PRIMARY KEY (`idConsola`),
  ADD UNIQUE KEY `idConsola` (`idConsola`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`fk_pk_Cliente`),
  ADD UNIQUE KEY `fk_pk_Cliente` (`fk_pk_Cliente`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`fk_pk_Factura`),
  ADD UNIQUE KEY `fk_pk_Factura` (`fk_pk_Factura`),
  ADD KEY `idEstadoEnvio` (`idEstadoEnvio`);

--
-- Indices de la tabla `estadoenvio`
--
ALTER TABLE `estadoenvio`
  ADD PRIMARY KEY (`idEstadoEnvio`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`,`idCliente`,`idPuntosCliente`,`fk_pk_direccion`),
  ADD KEY `fk_pk_direccion` (`fk_pk_direccion`),
  ADD KEY `idFormaPago` (`idFormaPago`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idPuntosCliente` (`idPuntosCliente`);

--
-- Indices de la tabla `formapago`
--
ALTER TABLE `formapago`
  ADD PRIMARY KEY (`idFormaPago`);

--
-- Indices de la tabla `generojuego`
--
ALTER TABLE `generojuego`
  ADD PRIMARY KEY (`idGeneroJuego`);

--
-- Indices de la tabla `historialpuntos`
--
ALTER TABLE `historialpuntos`
  ADD PRIMARY KEY (`pk_fk_Factura`,`idCliente`),
  ADD UNIQUE KEY `pk_fk_Factura` (`pk_fk_Factura`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`idJuego`),
  ADD UNIQUE KEY `idJuego` (`idJuego`),
  ADD KEY `idPlataforma` (`idPlataforma`),
  ADD KEY `idGeneroJuego` (`idGeneroJuego`),
  ADD KEY `idLenguaje` (`idLenguaje`),
  ADD KEY `idTipoJuego` (`idTipoJuego`),
  ADD KEY `idDesarrollador` (`idDesarrollador`);

--
-- Indices de la tabla `lenguaje`
--
ALTER TABLE `lenguaje`
  ADD PRIMARY KEY (`idLenguaje`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`idPlataforma`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`,`idAdministrador_crear`),
  ADD KEY `producto_ibfk_1` (`idAdministrador_crear`),
  ADD KEY `producto_ibfk_2` (`idTipoProducto`),
  ADD KEY `producto_ibfk_3` (`idMarca`);

--
-- Indices de la tabla `puntoscliente`
--
ALTER TABLE `puntoscliente`
  ADD PRIMARY KEY (`idPuntosCliente`),
  ADD UNIQUE KEY `idPuntosCliente` (`idPuntosCliente`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  ADD PRIMARY KEY (`usuarioId`,`usuarioRol`),
  ADD KEY `usuarioRol` (`usuarioRol`);

--
-- Indices de la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `tipojuego`
--
ALTER TABLE `tipojuego`
  ADD PRIMARY KEY (`idTipoJuego`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`idTipoProducto`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`t_doc`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacionfinal`
--
ALTER TABLE `calificacionfinal`
  MODIFY `idProducto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `consola`
--
ALTER TABLE `consola`
  MODIFY `idConsola` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `fk_pk_Cliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `fk_pk_Factura` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historialpuntos`
--
ALTER TABLE `historialpuntos`
  MODIFY `pk_fk_Factura` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `idJuego` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `puntoscliente`
--
ALTER TABLE `puntoscliente`
  MODIFY `idPuntosCliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`idAdministrador`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `administrador_ibfk_2` FOREIGN KEY (`pf_fk_tdoc`) REFERENCES `tipo_documento` (`t_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificacionfinal`
--
ALTER TABLE `calificacionfinal`
  ADD CONSTRAINT `calificacionfinal_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `caracteristicasfis`
--
ALTER TABLE `caracteristicasfis`
  ADD CONSTRAINT `caracteristicasfis_ibfk_1` FOREIGN KEY (`idConsola`) REFERENCES `consola` (`idConsola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `caracteristicastec`
--
ALTER TABLE `caracteristicastec`
  ADD CONSTRAINT `caracteristicastec_ibfk_1` FOREIGN KEY (`idConsola`) REFERENCES `consola` (`idConsola`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `caracteristicastec_ibfk_2` FOREIGN KEY (`plataforma`) REFERENCES `plataforma` (`idPlataforma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `conectividad`
--
ALTER TABLE `conectividad`
  ADD CONSTRAINT `conectividad_ibfk_1` FOREIGN KEY (`idConsola`) REFERENCES `consola` (`idConsola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `conectividadconsola`
--
ALTER TABLE `conectividadconsola`
  ADD CONSTRAINT `conectividadconsola_ibfk_1` FOREIGN KEY (`idConectividad`) REFERENCES `consola` (`idConsola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consola`
--
ALTER TABLE `consola`
  ADD CONSTRAINT `consola_ibfk_1` FOREIGN KEY (`idConsola`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `detallefactura_ibfk_1` FOREIGN KEY (`fk_pk_Factura`) REFERENCES `factura` (`idFactura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallefactura_ibfk_2` FOREIGN KEY (`fk_pk_Producto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dimensiones`
--
ALTER TABLE `dimensiones`
  ADD CONSTRAINT `dimensiones_ibfk_1` FOREIGN KEY (`idConsola`) REFERENCES `consola` (`idConsola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`fk_pk_Cliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`idEstadoEnvio`) REFERENCES `estadoenvio` (`idEstadoEnvio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`fk_pk_Factura`) REFERENCES `factura` (`idFactura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`fk_pk_direccion`) REFERENCES `direccion` (`fk_pk_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idFormaPago`) REFERENCES `formapago` (`idFormaPago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`idPuntosCliente`) REFERENCES `puntoscliente` (`idPuntosCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historialpuntos`
--
ALTER TABLE `historialpuntos`
  ADD CONSTRAINT `historialpuntos_ibfk_1` FOREIGN KEY (`pk_fk_Factura`,`idCliente`) REFERENCES `factura` (`idFactura`, `idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
  ADD CONSTRAINT `juego_ibfk_1` FOREIGN KEY (`idJuego`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `juego_ibfk_2` FOREIGN KEY (`idPlataforma`) REFERENCES `plataforma` (`idPlataforma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `juego_ibfk_3` FOREIGN KEY (`idGeneroJuego`) REFERENCES `generojuego` (`idGeneroJuego`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `juego_ibfk_4` FOREIGN KEY (`idLenguaje`) REFERENCES `lenguaje` (`idLenguaje`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `juego_ibfk_5` FOREIGN KEY (`idTipoJuego`) REFERENCES `tipojuego` (`idTipoJuego`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `juego_ibfk_6` FOREIGN KEY (`idDesarrollador`) REFERENCES `desarrollador` (`idDesarrollador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idAdministrador_crear`) REFERENCES `administrador` (`idAdministrador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idTipoProducto`) REFERENCES `tipoproducto` (`idTipoProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puntoscliente`
--
ALTER TABLE `puntoscliente`
  ADD CONSTRAINT `puntoscliente_ibfk_1` FOREIGN KEY (`idPuntosCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  ADD CONSTRAINT `roles_usuario_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_usuario_ibfk_2` FOREIGN KEY (`usuarioRol`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD CONSTRAINT `soporte_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
