-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2022 a las 04:47:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `invpriv`
--
CREATE DATABASE IF NOT EXISTS `invpriv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `invpriv`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `SpEliminarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpEliminarProducto` (IN `_Cod_Producto` INT(10))   BEGIN

	DELETE FROM producto WHERE Cod_Producto=_Cod_Producto;
    
END$$

DROP PROCEDURE IF EXISTS `SpEliminarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpEliminarUsuario` (IN `_Documento` INT(11))   BEGIN
	DELETE FROM datos_p WHERE Documento =_Documento;
END$$

DROP PROCEDURE IF EXISTS `SpIniciarSesion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpIniciarSesion` (IN `_Username` VARCHAR(20), IN `_Contrasena` VARCHAR(20), IN `_Cod_Rol` INT(10))   BEGIN

	SELECT CONTRASENA FROM USUARIO WHERE USERNAME = _Username 
    								 AND CONTRASENA = _Contrasena 
                                     AND COD_ROL = Cod_Rol;

END$$

DROP PROCEDURE IF EXISTS `SpInsertarDatos_P`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertarDatos_P` (IN `_Documento` INT(11), IN `_Nombre` VARCHAR(50), IN `_Apellido` VARCHAR(50), IN `_Fecha_N` DATE, IN `_Telefono` VARCHAR(20), IN `_Correo` VARCHAR(80))   BEGIN
	INSERT INTO datos_p (Documento,
                         Nombre,
                         Apellido,
                         Fecha_N,
                         Telefono,
                         Correo)
                  VALUES(_Documento,
                         _Nombre,
                         _Apellido,
                         _Fecha_N,
                         _Telefono,
                         _Correo);
END$$

DROP PROCEDURE IF EXISTS `SpInsertarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertarProducto` (IN `_Cod_Producto` INT(10), IN `_Nombre` VARCHAR(100), IN `_Existencia` INT(6), IN `_Precio` INT(11), IN `Descripcion` TEXT, IN `_Imagen` LONGBLOB, IN `_Cod_Categoria` INT(10), IN `_Cod_Grupo` INT(10))   BEGIN

        INSERT INTO producto (Cod_Producto,
                              Nombre,
                              Existencia,
                              Precio,
                              Descripcion,
                              Imagen,
                              Cod_Categoria,
                              Cod_Grupo)
                      VALUES (_Cod_Producto,
                              _Nombre,
                              _Existencia,
                              _Precio,
                              _Descripcion,
                              _Imagen,
                              _Cod_Categoria,
                              _Cod_Grupo);

END$$

DROP PROCEDURE IF EXISTS `SpInsertarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertarUsuario` (IN `_Username` VARCHAR(20), IN `_Contrasena` VARCHAR(20), IN `_Documento` INT(11), IN `_Cod_Rol` INT(10))   BEGIN
	INSERT INTO usuario (Username,
                         Contrasena,
                         Documento,
                         Cod_Rol) 
                  VALUES(_Username,
                         _Contrasena,
                         _Documento,
                         _Cod_Rol) ;

END$$

DROP PROCEDURE IF EXISTS `SpModificarDatos_P`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpModificarDatos_P` (IN `_Documento` INT(11), IN `_Nombre` VARCHAR(50), IN `_Apellido` VARCHAR(50), IN `_Fecha_N` DATE, IN `_Telefono` VARCHAR(20), IN `_Correo` VARCHAR(80), IN `_Cod_Rol` INT(10))   BEGIN

	UPDATE datos_p SET 
                       NOMBRE=_Nombre,
                       APELLIDO=_Apellido,
                       FECHA_N=_Fecha_N,
                       TELEFONO=_Telefono,
                       CORREO=_Correo,
                       COD_ROL=_Cod_Rol
                WHERE Documento=_Documento;
                
END$$

DROP PROCEDURE IF EXISTS `SpModificarPass`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpModificarPass` (IN `_UserName` VARCHAR(20), IN `_Contrasena` VARCHAR(20))   BEGIN

        UPDATE usuario SET
                             Contrasena = _Contrasena
                      WHERE  username = _UserName;

END$$

DROP PROCEDURE IF EXISTS `SpModificarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpModificarProducto` (IN `_Cod_Producto` INT(10), IN `_Nombre` VARCHAR(100), IN `_Existencia` INT(6), IN `_Precio` INT(11), IN `Descripcion` TEXT, IN `_Imagen` LONGBLOB, IN `_Cod_Categoria` INT(10), IN `_Cod_Grupo` INT(10))   BEGIN

        UPDATE producto SET
                             Nombre=_Nombre,
                             Existencia=_Existencia,
                             Precio=_Precio,
                             Descripcion=_Descripcion,
                             Imagen=_Imagen,
                             Cod_Categoria=_Cod_Categoria,
                             Cod_Grupo=_Cod_Grup
                      WHERE  Cod_Producto=_Cod_Producto;

END$$

DROP PROCEDURE IF EXISTS `SpMostrarDatos_P`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpMostrarDatos_P` (IN `_Documento` INT(11))   BEGIN

	SELECT * FROM datos_p WHERE Documento=_Documento;
    
END$$

DROP PROCEDURE IF EXISTS `SpMostrarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpMostrarProducto` (IN `_Cod_Producto` INT(10))   BEGIN
	SELECT * FROM producto WHERE Cod_Producto=_Cod_Producto;
    
END$$

DROP PROCEDURE IF EXISTS `SpMostrarRol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpMostrarRol` ()   BEGIN
	SELECT Cod_Rol, Descripcion FROM rol;
END$$

DROP PROCEDURE IF EXISTS `SpMostrarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpMostrarUsuario` ()   BEGIN
	SELECT *
    FROM usuario
    INNER JOIN datos_p
    ON usuario.Documento = datos_p.Documento
    INNER JOIN rol
    ON usuario.Cod_Rol = rol.Cod_Rol;
END$$

DROP PROCEDURE IF EXISTS `SpValidarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpValidarUsuario` (IN `_Username` VARCHAR(20), IN `_Contrasena` VARCHAR(20))   BEGIN

	SELECT CONTRASENA FROM USUARIO WHERE USERNAME = _Username 
    								 AND CONTRASENA = _Contrasena;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `Cod_categoria` int(10) NOT NULL,
  `Descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`Cod_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Cod_categoria`, `Descripcion`) VALUES
(1, 'PECES'),
(2, 'GATOS'),
(3, 'PERROS'),
(4, 'CANARIOS'),
(5, 'HAMSTERS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_p`
--

DROP TABLE IF EXISTS `datos_p`;
CREATE TABLE IF NOT EXISTS `datos_p` (
  `Documento` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Fecha_N` date NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Correo` varchar(80) NOT NULL,
  PRIMARY KEY (`Documento`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_p`
--

INSERT INTO `datos_p` (`Documento`, `Nombre`, `Apellido`, `Fecha_N`, `Telefono`, `Correo`) VALUES
(9944, 'pamela', 'pamelo', '2026-05-03', '302', '@@'),
(9999999, 'Luis Alfonso', 'Becerra', '1984-03-01', '3333333', 'luisalfonso@misena.edu.co'),
(1022036498, 'Luis Carlos', 'Hernandez Lopez', '1998-10-06', '3043290842', 'luichernandez1111111@gmail.com'),
(1042767596, 'Farley Felipe', 'Orrego Villa', '1989-12-03', '3128633688', 'fforrego@misena.edu.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `Cod_Grupo` int(10) NOT NULL,
  `Descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`Cod_Grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`Cod_Grupo`, `Descripcion`) VALUES
(1, 'ALIMENTO'),
(2, 'ACCESORIOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
CREATE TABLE IF NOT EXISTS `movimiento` (
  `Cod_Consecutivo` int(10) NOT NULL AUTO_INCREMENT,
  `F_Movimiento` date NOT NULL,
  `Hora` datetime NOT NULL,
  `Valor_Total` int(20) NOT NULL,
  `Documento` int(11) NOT NULL,
  `Cod_Mov` int(10) NOT NULL,
  PRIMARY KEY (`Cod_Consecutivo`),
  KEY `Documento` (`Documento`),
  KEY `Cod_Mov` (`Cod_Mov`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `Cod_Producto` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Existencia` int(6) NOT NULL,
  `Precio` int(9) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Imagen` longblob NOT NULL,
  `Cod_Categoria` int(10) NOT NULL,
  `Cod_Grupo` int(10) NOT NULL,
  PRIMARY KEY (`Cod_Producto`),
  KEY `Cod_Categoria` (`Cod_Categoria`),
  KEY `Cod_Grupo` (`Cod_Grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_detallado`
--

DROP TABLE IF EXISTS `registro_detallado`;
CREATE TABLE IF NOT EXISTS `registro_detallado` (
  `Id_Mov_Detallado` int(10) NOT NULL AUTO_INCREMENT,
  `Cantidad` int(6) NOT NULL,
  `Cod_Consecutivo` int(10) NOT NULL,
  `Cod_Producto` int(10) NOT NULL,
  PRIMARY KEY (`Id_Mov_Detallado`),
  KEY `Cod_Consecutivo` (`Cod_Consecutivo`),
  KEY `Cod_Producto` (`Cod_Producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `Cod_Rol` int(10) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`Cod_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Cod_Rol`, `Descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

DROP TABLE IF EXISTS `tipo_movimiento`;
CREATE TABLE IF NOT EXISTS `tipo_movimiento` (
  `Cod_Mov` int(10) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`Cod_Mov`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`Cod_Mov`, `Descripcion`) VALUES
(1, 'ENTRADA'),
(2, 'SALIDA'),
(3, 'AJUSTE'),
(4, 'VENTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_Usuario` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `Contrasena` varchar(20) NOT NULL,
  `Documento` int(11) NOT NULL,
  `Cod_Rol` int(10) NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `Documento` (`Documento`),
  KEY `Cod_Rol` (`Cod_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4447 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `username`, `Contrasena`, `Documento`, `Cod_Rol`) VALUES
(4433, 'luisxhl7', '123', 1022036498, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`Cod_Mov`) REFERENCES `tipo_movimiento` (`Cod_Mov`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimiento_ibfk_2` FOREIGN KEY (`Documento`) REFERENCES `datos_p` (`Documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Cod_Categoria`) REFERENCES `categoria` (`Cod_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`Cod_Grupo`) REFERENCES `grupo` (`Cod_Grupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_detallado`
--
ALTER TABLE `registro_detallado`
  ADD CONSTRAINT `registro_detallado_ibfk_1` FOREIGN KEY (`Cod_Producto`) REFERENCES `producto` (`Cod_Producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_detallado_ibfk_2` FOREIGN KEY (`Cod_Consecutivo`) REFERENCES `movimiento` (`Cod_Consecutivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Cod_Rol`) REFERENCES `rol` (`Cod_Rol`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`Documento`) REFERENCES `datos_p` (`Documento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
