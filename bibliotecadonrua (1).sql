-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-09-2015 a las 17:55:48
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bibliotecadonrua`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` varchar(8) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nombres` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `Apellidos` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`ID`, `Password`, `Nombres`, `Apellidos`) VALUES
('20030077', '20030077', 'Carlos', 'Rodríguez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar`
--

CREATE TABLE IF NOT EXISTS `ejemplar` (
  `Cod_Ejemplar` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `Cod_Libro` varchar(8) CHARACTER SET latin1 NOT NULL,
  `Ubicacion` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Cod_Ejemplar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ejemplar`
--

INSERT INTO `ejemplar` (`Cod_Ejemplar`, `Cod_Libro`, `Ubicacion`, `Estado`) VALUES
('LB0001-01', 'LB0001', '101-23', 0),
('LB0001-02', 'LB0001', '101-22', 0),
('LB0002-01', 'LB0002', '78-37', 1),
('LB0002-02', 'LB0002', '78-38', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `Cod_Libro` varchar(8) CHARACTER SET latin1 NOT NULL,
  `Nombre` varchar(60) CHARACTER SET latin1 NOT NULL,
  `Edicion` varchar(20) CHARACTER SET latin1 NOT NULL,
  `TipoDocumento` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Categoria` varchar(50) CHARACTER SET latin1 NOT NULL,
  `FechaPublicacion` date NOT NULL,
  `ISBN` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Editorial` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Autor` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Disponible` int(11) NOT NULL,
  PRIMARY KEY (`Cod_Libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`Cod_Libro`, `Nombre`, `Edicion`, `TipoDocumento`, `Categoria`, `FechaPublicacion`, `ISBN`, `Editorial`, `Autor`, `Cantidad`, `Disponible`) VALUES
('LB0001', 'El Catesismo de la Iglesia Católica', 'Primera', 'Libro', 'Religioso', '2000-10-12', '6982-1231-4323', 'La luz', 'Jhon Maxwell', 8, 8),
('LB0002', 'La Biblia Latinoamericana', 'Cuarta', 'Libro', 'Religioso', '2004-00-22', '1234-5422-1234', 'Lidere', '-', 18, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `Cod_Registro` int(11) NOT NULL,
  `Cod_Ejemplar` varchar(8) CHARACTER SET latin1 NOT NULL,
  `Cod_Usuario` varchar(8) CHARACTER SET latin1 NOT NULL,
  `Fecha_Prestamo` date NOT NULL,
  `Fecha_Devolucion` date NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`Cod_Registro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`Cod_Registro`, `Cod_Ejemplar`, `Cod_Usuario`, `Fecha_Prestamo`, `Fecha_Devolucion`, `Estado`) VALUES
(1, 'LB001-01', 'RM142091', '2015-07-11', '2015-07-18', 1),
(2, 'LB002-01', 'RB142093', '2015-04-18', '2015-07-25', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`codigo`, `tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Secretaria'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` varchar(8) CHARACTER SET latin1 NOT NULL,
  `Nombre` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Apellido` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Correo` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Telefono` varchar(9) CHARACTER SET latin1 NOT NULL,
  `Grupo` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `TipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `TipoUsuario` (`TipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Nombre`, `Apellido`, `Correo`, `Telefono`, `Grupo`, `Password`, `TipoUsuario`) VALUES
('admin', 'Carlos', 'Majano', 'carlos.majano2101@gmail.com', '7845-4512', 'Maestro', 'admin2', 2),
('douglas1', 'Douglas Eduardo', 'Mejia', 'douglas11@gmail.com', '2154-8954', 'Monaguillo', '123456', 3),
('Oscar11', 'Oscar René', 'Osorio', 'oscar.osorio@hotmail.es', '7456-9852', 'Catequista', '123456', 3),
('RB142093', 'Juan Carlos', 'Rosales', 'carlosrosales@gmail.com', '7867-1231', 'Catequistas', '123456', 1),
('RM142091', 'Carlos', 'Rodriguez', 'carlos.majano@hotmail.com', '7612-4312', 'Monaguios', '20030077', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_TipoUsuario` FOREIGN KEY (`TipoUsuario`) REFERENCES `tipousuario` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
