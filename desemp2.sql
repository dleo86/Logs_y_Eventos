-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-04-2019 a las 07:27:57
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `desemp2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Tipo` smallint(6) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ID`, `Descripcion`, `Tipo`) VALUES
(1, 'Activación de cuenta', 2),
(2, 'Email inexistente para activar', 1),
(3, 'Acceso correcto', 2),
(4, 'Datos incorrectos en login', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FechaLog` datetime NOT NULL,
  `Id_Evento` int(11) DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`Id`, `FechaLog`, `Id_Evento`, `Email`) VALUES
(1, '2018-11-16 21:49:57', 1, 'sue@gmail.com'),
(29, '2018-11-17 13:47:25', 2, 'leo@gmail.com'),
(3, '2018-11-16 22:01:27', 1, 'pablo@gmail.com'),
(4, '2018-11-16 22:05:46', 1, 'sue@gmail.com'),
(5, '2018-11-16 22:06:52', 1, 'sue@gmail.com'),
(6, '2018-11-16 22:20:03', 2, 'leo@gmail.com'),
(7, '2018-11-17 08:20:49', 3, 'sue@gmail.com'),
(8, '2018-11-17 08:21:22', 3, 'sue@gmail.com'),
(9, '2018-11-17 08:24:35', 3, 'sue@gmail.com'),
(10, '2018-11-17 08:35:56', 3, 'sue@gmail.com'),
(11, '2018-11-17 08:37:18', 4, 'maria@gmail.com'),
(12, '2018-11-17 10:10:59', 3, 'sue@gmail.com'),
(13, '2018-11-17 11:26:25', 3, 'sue@gmail.com'),
(14, '2018-11-17 12:34:20', 3, 'sue@gmail.com'),
(15, '2018-11-17 12:35:21', 3, 'sue@gmail.com'),
(16, '2018-11-17 13:07:27', 2, 'leo1@gmail.com'),
(17, '2018-11-17 13:09:44', 2, 'leo3@gmail.com'),
(18, '2018-11-17 13:10:42', 2, 'leo4@gmail.com'),
(19, '2018-11-17 13:11:14', 2, 'leo5@gmail.com'),
(20, '2018-11-17 13:13:25', 2, 'leo15@gmail.com'),
(21, '2018-11-17 13:14:30', 2, 'leo20@gmail.com'),
(22, '2018-11-17 13:15:36', 2, 'leo50@gmail.com'),
(23, '2018-11-17 13:17:34', 2, 'dleo12@gmail.com'),
(24, '2018-11-17 13:18:39', 2, 'dleo32@gmail.com'),
(25, '2018-11-17 13:22:30', 2, 'prueba@gmail.com'),
(26, '2018-11-17 13:25:53', 2, 'probando@gmail.com'),
(27, '2018-11-17 13:28:11', 2, 'prueba35@gmail.com'),
(28, '2018-11-17 13:30:08', 2, 'ricardo@yahoo.com'),
(30, '2018-11-17 13:47:39', 4, 'leo@gmail.com'),
(31, '2018-11-17 13:47:55', 4, 'leo@gmail.com'),
(32, '2018-11-17 13:48:15', 1, 'pablo@gmail.com'),
(33, '2018-11-17 13:48:40', 3, 'pablo@gmail.com'),
(34, '2018-11-17 13:53:20', 3, 'sue@gmail.com'),
(35, '2019-04-01 13:24:51', 3, 'sue@gmail.com'),
(36, '2019-04-01 13:40:05', 4, 'maria@gmail.com'),
(37, '2019-04-01 13:47:21', 3, 'sue@gmail.com'),
(38, '2019-04-01 20:39:35', 4, 'mperez@gmail.com'),
(39, '2019-04-01 20:58:35', 3, 'sue@gmail.com'),
(40, '2019-04-01 21:22:51', 4, 'maria@gmail.com'),
(41, '2019-04-03 05:19:03', 3, 'sue@gmail.com'),
(42, '2019-04-03 07:08:13', 1, 'pablo@gmail.com'),
(43, '2019-04-03 07:08:32', 3, 'pablo@gmail.com'),
(44, '2019-04-03 07:23:32', 3, 'pablo@gmail.com'),
(45, '2019-04-03 07:23:51', 3, 'sue@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `FechaCreacion` datetime NOT NULL,
  `Activo` int(11) DEFAULT NULL,
  `FechaActivacion` datetime DEFAULT NULL,
  `Nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Email`, `Clave`, `FechaCreacion`, `Activo`, `FechaActivacion`, `Nivel`) VALUES
(1, 'sue@gmail.com', '84ddfb34126fc3a48ee38d704', '2017-07-08 00:00:00', 1, '2018-11-16 22:06:51', 1),
(2, 'pablo@gmail.com', 'ea6b2efbdd4255a9f1b3bbc63', '2017-07-08 00:00:00', 1, '2019-04-03 07:08:12', 2),
(3, 'maria@gmail.com', '123789', '2017-07-08 00:00:00', 0, NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
