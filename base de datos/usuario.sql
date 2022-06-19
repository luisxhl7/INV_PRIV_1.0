-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2022 a las 02:45:46
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inpriv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(50) NOT NULL,
  `ROL` varchar(50) NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `APELLIDO` varchar(50) NOT NULL,
  `DOCUMENTO` varchar(50) NOT NULL,
  `NACIMIENTO` varchar(50) NOT NULL,
  `TELEFONO` varchar(50) NOT NULL,
  `CORREO` varchar(50) NOT NULL,
  `CLAVE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo`, `ROL`, `USUARIO`, `APELLIDO`, `DOCUMENTO`, `NACIMIENTO`, `TELEFONO`, `CORREO`, `CLAVE`) VALUES
(1, 'Administrador', 'luis', 'lopez', '1022036498', '06/oct/1998', '3043290842', 'LUIS@AKHSBKJHD', '123'),
(25, 'Usuario', 'martin', 'perez', '23456', '12/12/1999', '987654', 'martin@gmail', '43567'),
(26, 'Invitado', 'camila', 'hernandez', '87989', '12/1/1999', '6789', 'camila@hootmail..com', '8585855'),
(27, 'Invitado', 'VIVIANA', 'JARAILLO', '11223344', '01/01/2000', '321949388', 'vivi7@gmail.com', 'vivi123'),
(28, 'Usuario', 'mariana', 'atehortua', '18826t6366', '12/12/2005', '576789', 'mariate123@asdasd', '567');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
