-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2020 a las 19:41:17
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
  `titulo` varchar(45) NOT NULL,
  `url_imagen` varchar(200) NOT NULL,
  `municipio` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `colonia` varchar(20) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `telefono` int(50) NOT NULL,
  `sitio` varchar(200) DEFAULT NULL,
  `descripcion` longtext NOT NULL,
  `entrada` varchar(20) NOT NULL,
  `cierre` varchar(20) NOT NULL,
  `idSolicitud` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`idAnuncio`, `idCategoria`, `titulo`, `url_imagen`, `municipio`, `estado`, `calle`, `colonia`, `cp`, `telefono`, `sitio`, `descripcion`, `entrada`, `cierre`, `idSolicitud`) VALUES
(88, 14, 'Hotel Bello Amanecer', 'uploads/images/hotel1.jpg', 'Acámbaro', 'Guanajuato', 'Hidalgo 100', 'Centro', '38600', 41711110, 'www.bellavista.com', 'Hotel 5 estrellas con la mejor vista ubicado en el centro de Acámbaro', '00:00', '00:00', NULL),
(89, 14, 'Hotel El Descanso', 'uploads/images/hotel2.jpg', 'Taranda', 'Guanajuato', 'Carranza 210', 'Centro', '86200', 41711119, '', 'Venga y tome el mejor descanso en Taranda', '00:00', '00:00', NULL),
(90, 15, 'Zapatito Feliz', 'uploads/images/zapaterias1.jpg', 'Acámbaro', 'Guanajuato', '1 de Mayo 221', 'Centro', '21300', 11111, 'www.zapatitofeliz.com', 'El mejor calzado de Acámbaro', '00:00', '00:00', NULL),
(91, 15, 'Zapatería El Tony Botas', 'uploads/images/zapaterias2.jpg', 'Acámbaro', 'Guanajuato', '1 de Mayo 2219', 'Centro', '38600', 4172222, 'www.tonybotas.com', 'Las mejores botas de Acámbaro', '00:00', '00:00', NULL),
(92, 16, 'Balneario Agua Tibia', 'uploads/images/balneario.jpg', 'Acámbaro', 'Guanajuato', 'Hidalgo 100', 'Colinas', '34700', 41711119, '', 'Ven y relajate en nuestro balneario', '00:00', '00:00', NULL),
(95, 17, 'Restauran ', 'uploads/images/restaurant1.jpg', 'Acámbaro', 'Guanajuato', '1 de Mayo 221', 'Centro', '37661', 41711118, '', 'Restaurant familiar en Acámbaro', '00:00', '00:00', 37);

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
(17, 'Restaurant', 'Negocios dedicados a la venta de alimentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `estatus` enum('Publicado','Pendiente','','') NOT NULL DEFAULT 'Pendiente',
  `textoComentario` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `idUsuario`, `estatus`, `textoComentario`) VALUES
(1, 2, 'Publicado', 'Hola');

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
  `url_imagen` varchar(200) DEFAULT NULL,
  `rfc` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `calle` varchar(200) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `cp` int(11) NOT NULL,
  `municipio` enum('Acámbaro','Coroneo','Jerécuero','Taranda') NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'Guanajuato',
  `estatus_solicitud` enum('En proceso','Aceptada','Rechazada','Publicada') NOT NULL DEFAULT 'En proceso',
  `fecha_solicitud` date NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `observaciones` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`idSolicitud`, `idUsuario`, `nombre_negocio`, `url_imagen`, `rfc`, `tel`, `calle`, `colonia`, `cp`, `municipio`, `estado`, `estatus_solicitud`, `fecha_solicitud`, `descripcion`, `observaciones`) VALUES
(37, 51, 'Restauran \"El frijolito\"', 'uploads/images/restaurant1.jpg', 'FRIJOLITO323232', '41711118', '1 de Mayo 221', 'Centro', 37661, 'Acámbaro', 'Guanajuato', 'Publicada', '2020-10-13', 'Restaurant familiar en Acámbaro', NULL),
(38, 57, 'Restaurant \"El pollito\"', 'uploads/images/restaurant2.jpg', 'POLLO23232WER', '41711118', 'Morelos 233', 'Centro', 45899, '', 'Guanajuato', 'En proceso', '2020-10-13', 'Ven y prueba los mejores pollos a la leña', NULL);

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
(58, 'Jose', 'Perez', 'suscriptor6@acambaro.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 3);

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
  ADD KEY `idCliente_idx` (`idUsuario`);

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
  MODIFY `idAnuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
