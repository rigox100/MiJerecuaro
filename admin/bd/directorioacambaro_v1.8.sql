-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2020 a las 19:24:40
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `directorioacambaro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `idAnuncio` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `url_imagen` varchar(200) NOT NULL,
  `municipio` varchar(50) NOT NULL DEFAULT 'Acámbaro',
  `estado` varchar(20) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `colonia` varchar(20) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `telefono` int(50) NOT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `sitio` varchar(200) DEFAULT NULL,
  `google_maps` varchar(500) DEFAULT NULL,
  `descripcion` longtext NOT NULL,
  `primer_dia_sem` enum('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo') DEFAULT NULL,
  `ultimo_dia_sem` enum('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo') DEFAULT NULL,
  `entrada` varchar(20) NOT NULL,
  `cierre` varchar(20) NOT NULL,
  `estatus_anuncio` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
  `keywords` varchar(500) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `destacado` enum('Sí','No') NOT NULL DEFAULT 'No',
  `idSolicitud` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombre`, `descripcion`) VALUES
(14, 'Hoteles', 'Negocios dedicados a hotelería'),
(15, 'Zapaterías', 'Negocios dedicados a la venta de calzado'),
(16, 'Balnearios', 'Negocios dedicados a la recreación en balnearios'),
(17, 'Restaurant', 'Negocios dedicados a la venta de alimentos'),
(18, 'Cafeterías', 'Cafeterías'),
(19, 'Consultoría especializada', 'Consultoría'),
(20, 'Viajes', 'asasasa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idAnuncio` int(11) NOT NULL,
  `ranking` int(11) DEFAULT NULL,
  `textoComentario` varchar(200) DEFAULT NULL,
  `publicado` enum('Sí','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `idContacto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `empresa` varchar(45) DEFAULT NULL,
  `asunto` varchar(50) NOT NULL,
  `textMensaje` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `rol`, `descripcion`) VALUES
(1, 'Administrador', 'Control total de todos los módulos del sistema'),
(2, 'Colaborador', 'Permite gestionar todas los anuncios, categorías, comentarios y solicitudes de anuncios'),
(3, 'Suscriptor', 'Permite comentar anuncios, realizar solicitudes para anunciar su negocio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `idSolicitud` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombre_negocio` varchar(100) NOT NULL,
  `url_imagen` varchar(200) NOT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `tel` varchar(20) NOT NULL,
  `calle` varchar(200) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `municipio` varchar(50) NOT NULL DEFAULT 'Acámbaro',
  `estado` varchar(50) NOT NULL DEFAULT 'Guanajuato',
  `estatus_solicitud` enum('En proceso','Aceptada','Rechazada','Publicada') NOT NULL DEFAULT 'En proceso',
  `fecha_solicitud` date NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `observaciones` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(120) NOT NULL,
  `estatus` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `email`, `password`, `estatus`, `idRol`) VALUES
(2, 'Presidencia', 'Acámbaro', 'presidencia@acambaro.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 1),
(15, 'Juan', 'Lugo', 'colaborador1@acambaro.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Activo', 2),
(51, 'Pepito', 'Perez', 'suscriptor1@acambaro.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 3),
(52, 'Dummy', 'Lopez', 'suscriptor2@acambaro.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 3),
(53, 'Dummy 2', 'Dummy', 'suscriptor3@acambaro.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 3),
(54, 'Dummy 4', 'Dummy ', 'suscriptor4@acambaro.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 3),
(57, 'Braulio', 'Braulio', 'suscriptor5@acambaro.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 3),
(58, 'Jose', 'Perez', 'suscriptor6@acambaro.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 3),
(60, 'Juan', 'Hernández', 'juan@juan.com', '202cb962ac59075b964b07152d234b70', 'Activo', 3),
(61, 'Christianaasa', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Activo', 3),
(72, 'Christian', 'Lozano', 'chris@micorreo.com', '25d55ad283aa400af464c76d713c07ad', 'Activo', 3),
(73, 'AVA', 'CONSULTORES', 'ava@ava.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 3),
(74, 'Prueba', 'Test', 'prueba@prueba.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 3),
(75, 'Chris', 'Lozano', 'chris@acambaro.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 3);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `usuarios_AFTER_DELETE` AFTER DELETE ON `usuarios` FOR EACH ROW BEGIN

END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`idAnuncio`),
  ADD KEY `idCategoria_idx` (`idCategoria`),
  ADD KEY `idSolicitud_idx` (`idSolicitud`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idUsuario_idx` (`idUsuario`) USING BTREE,
  ADD KEY `idAnuncio_idx` (`idAnuncio`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `idUsuario_idx` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `idRol_idx` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `idAnuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idSolicitud_idx` FOREIGN KEY (`idSolicitud`) REFERENCES `solicitudes` (`idSolicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `idAnuncio_idx` FOREIGN KEY (`idAnuncio`) REFERENCES `anuncios` (`idAnuncio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `idUsuario_idx` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idRol_idx` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
