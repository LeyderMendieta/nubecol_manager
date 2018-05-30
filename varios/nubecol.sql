-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-05-2018 a las 22:53:20
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nubecol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

DROP TABLE IF EXISTS `anuncio`;
CREATE TABLE IF NOT EXISTS `anuncio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(100) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(100) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(100) COLLATE utf8_bin NOT NULL,
  `fecha_insercion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `anuncio`
--

INSERT INTO `anuncio` (`id`, `ruta`, `tipo`, `usuario`, `fecha_insercion`, `state`) VALUES
(1, 'anuncio/1024592834_29052018_1.jpg', 'spotify', '1024592834', '2018-05-29 14:23:45', 1),
(2, './anuncio/1024592834/30_05_2018_netflix_miguel.jpg', 'netflix', '1024592834', '2018-05-30 14:48:11', 1),
(3, './anuncio/1024592834/30_05_2018_spotify_g_1x.jpg', 'spotify', '1024592834', '2018-05-30 16:20:24', 1),
(4, './anuncio/1024592834/30_05_2018_logo.png', 'spotify', '1024592834', '2018-05-30 16:21:45', 1),
(5, './anuncio/1024592834/30_05_2018_netflix_miguel.jpg', 'netflix', '1024592834', '2018-05-30 16:21:53', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `nombre` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `apellido` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `celular` bigint(50) NOT NULL,
  `fk_vendedor` bigint(60) DEFAULT NULL,
  `fk_encargado` bigint(60) DEFAULT NULL,
  `detalle` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`celular`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Clientes el potencial del proyecto';

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nombre`, `apellido`, `celular`, `fk_vendedor`, `fk_encargado`, `detalle`, `fecha_creacion`) VALUES
('Andres', 'Sampedro', 3194413512, 1024592834, 1024592834, 'El domingo se le entrega la cuenta y paga el martes', '2018-05-29 11:49:49'),
('Oscar', 'Sosa', 3212154802, 1024592834, 1024592834, 'Son 2 meses en realidad. paga 30/05/18 24.000', '2018-05-30 10:17:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresia`
--

DROP TABLE IF EXISTS `membresia`;
CREATE TABLE IF NOT EXISTS `membresia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(250) COLLATE utf8_bin NOT NULL,
  `contra` varchar(250) COLLATE utf8_bin NOT NULL,
  `tiempo` varchar(100) COLLATE utf8_bin NOT NULL,
  `vencimiento` varchar(100) COLLATE utf8_bin NOT NULL,
  `cliente` bigint(60) NOT NULL,
  `vendedor` bigint(60) NOT NULL,
  `suscripcion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='membresia';

--
-- Volcado de datos para la tabla `membresia`
--

INSERT INTO `membresia` (`id`, `tipo`, `correo`, `contra`, `tiempo`, `vencimiento`, `cliente`, `vendedor`, `suscripcion`, `fecha_creacion`) VALUES
(1, '5', 'andres.sampedro1@gmail.com', '0000hola', '3 MESES', '27/08/2018', 3194413512, 1024592834, 'SPOTIFY', '2018-05-29 11:51:03'),
(2, '1', 'rus813rus@yopmail.com', '00hola', '1 MES', '29/06/2018', 3212154802, 1024592834, 'NETFLIX', '2018-05-30 10:17:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

DROP TABLE IF EXISTS `novedades`;
CREATE TABLE IF NOT EXISTS `novedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creador` varchar(100) COLLATE utf8_bin NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titulo` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`id`, `creador`, `fecha_creacion`, `titulo`, `descripcion`) VALUES
(1, 'LEYDER MENDETA', '2018-05-30 17:36:51', 'Creación sistema', 'Se realizan proceso alternos para iniciar el proceso de ejecución del aplicativo web para el negocio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `ventaja` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `requisito` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Roles de usuario';

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `descripcion`, `ventaja`, `requisito`) VALUES
(1, 'Lider', 'El encargado de un equipo de trabajo y tiene socios, vendedores y clientes', 'El precios de las cuentas sera generada apartir de la cantidad de red negocio que tenga $4000 NETFLIX/MES $10000 SPOTIFY/3MES', 'Tener 5 socios y 8+ vendedores y facturar mas de 50+ cuentas por semana'),
(2, 'Socio', 'El director de un equipo con varios vendedores que hacen parte del negocio', 'Los precios para Netflix son $6000/mes y Spotify a $12000/3 meses, Cuenta gratuita para uso personal y permanente, soporte diario', 'Tener mas de 5 vendedores y facturar 30+ cuentas por semana'),
(3, 'Vendedor', 'La fuerza de ventas mas importante del negocio, ofrece cuentas para adquirir un ingreso frecuente', 'Los precios para Netflix son $8000/mes y Spotify a $14000/3 meses', 'Tener clientes en control y facturar minimo 5 clientes por semana'),
(4, 'Aspirante', 'Persona que busca ser parte del proyecto y sabe de que funciona', 'Estar pendiente de los avances del proyecto', 'Registrarse en el aplicativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cuenta`
--

DROP TABLE IF EXISTS `tipo_cuenta`;
CREATE TABLE IF NOT EXISTS `tipo_cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) COLLATE utf8_bin NOT NULL,
  `tiempo` varchar(100) COLLATE utf8_bin NOT NULL,
  `vencimiento` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tipo de cuenta que existe en el sistema de informacion';

--
-- Volcado de datos para la tabla `tipo_cuenta`
--

INSERT INTO `tipo_cuenta` (`id`, `categoria`, `tiempo`, `vencimiento`) VALUES
(1, 'NETFLIX', '1 MES', '30'),
(2, 'NETFLIX', '3 MESES', '90'),
(3, 'NETFLIX', '6 MESES', '180'),
(4, 'NETFLIX', '12 MESES', '360'),
(5, 'SPOTIFY', '3 MESES', '90'),
(6, 'SPOTIFY', '6 MESES', '180'),
(7, 'SPOTIFY', '12 MESES', '360');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `celular` varchar(100) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `fk_referido` int(10) DEFAULT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Usuarios del proyecto';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `documento`, `password`, `celular`, `nombre`, `apellido`, `fk_referido`, `rol`) VALUES
(1, '1024592834', '991666daff5ee54f5a36d86e6bed3050', '3208463317', 'LEYDER', 'MENDIETA', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
