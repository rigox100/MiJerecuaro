-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2020 a las 23:31:03
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
  `url_imagen` varchar(45) NOT NULL,
  `municipio` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `colonia` varchar(20) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `telefono` int(50) NOT NULL,
  `sitio` varchar(200) DEFAULT NULL,
  `descripcion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`idAnuncio`, `idCategoria`, `titulo`, `url_imagen`, `municipio`, `estado`, `calle`, `colonia`, `cp`, `telefono`, `sitio`, `descripcion`) VALUES
(7, 3, 'Zapatería Tres Hermanos', 'uploads/images/descarga.png', 'Taranda', 'Guanajuato', 'Corregidora', 'Centro', '38600', 1722323, 'www.treshermanos.com', 'Zapatería tres hermanos.'),
(9, 7, 'El Embarcadero', 'uploads/images/descarga.jpg', 'Acámbaro', 'Guanajuato', 'Salida a Morelia', 'Jaripeo', '34500', 123456, 'www.embarcadero.com', 'Restaurante el embarcadero'),
(10, 4, 'Ropa Pepito', 'uploads/images/ple.jpg', 'Acámbaro', 'Guanajuato', 'Matamoros', 'Centro', '50500', 17, 'www.ropapepito.com', 'Ropa de pepito'),
(11, 6, 'Panadería Tio Sam', 'uploads/images/maxresdefault.jpg', 'Acámbaro', 'Guanajuato', 'Corregidora', 'Centro', '38600', 1725656, 'www.tiosam.com', 'panificadora chida'),
(12, 5, 'Hotel Acámbaro Plaza', 'uploads/images/descarga (1).jpg', 'Acámbaro', 'Guanajuato', 'Melchor Ocampo', 'Centro', '45600', 1234567, 'www.hotelacambaroplaza.com', 'Hotel en Acámbaro');

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
(3, 'Zapatería', 'Categoría para zapaterías prueba'),
(4, 'Ropa y accesorios', 'Categoría para ropa'),
(5, 'Hoteles', 'Categoría para hoteles prueba'),
(6, 'Panaderías', 'Categoría para panaderías'),
(7, 'Restaurantes', 'Categoría para restaurantes');

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
(1, 'Administrador', 'Admin'),
(2, 'Colaborador', 'asasas'),
(3, 'Suscriptor', 'asasas');

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
(2, 'Presidencia', 'Acámbaro', 'presidencia@acambaro', '12345', 'Activo', 1),
(15, 'Chris', 'Lozano', 'chris.lozano8603@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Activo', 3),
(18, 'asas', 'asas', 'asasa@asas', 'd41d8cd98f00b204e9800998ecf8427e', 'Activo', 3),
(20, 'Christian Emmanuel', 'Lozano Hernández', 'christoforo18@hotmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Activo', 3),
(23, 'asas', 'asas', 'asasasasaasas@asas', 'd41d8cd98f00b204e9800998ecf8427e', 'Activo', 3),
(26, 'Christian Emmanuel', 'Lozano Hernández', 'christoforo18aaa@hotmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Activo', 3),
(47, 'asas', 'asas', 'asasasasasasq22@asas', '2f3e9eccc22ee583cf7bad86c751d865', 'Activo', 3),
(48, 'asas', 'asas', 'asasasasasasq2222@asas', 'baa7a52965b99778f38ef37f235e9053', 'Activo', 3),
(49, 'asas', 'asas', '212323@asas.com', 'de872154ffbf91a5dcc0e539dd2d5106', 'Activo', 3);

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
  ADD KEY `idCategoria_idx` (`idCategoria`);

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
  MODIFY `idAnuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idRol_idx` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
