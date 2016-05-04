-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2016 a las 22:06:36
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biciabm`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BorrarPersona` (IN `idp` INT(18))  NO SQL
delete from persona	WHERE id=idp$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarPersona` (IN `pnombre` VARCHAR(50), IN `papellido` VARCHAR(50), IN `pdni` VARCHAR(50), IN `pfoto` VARCHAR(50))  NO SQL
INSERT into persona (nombre,apellido,dni,foto)
values
(pnombre,papellido,pdni,pfoto)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarPersona` (IN `pid` INT, IN `pnombre` VARCHAR(50), IN `papellido` VARCHAR(50), IN `pfoto` VARCHAR(50))  NO SQL
update persona 
				set nombre=pnombre,
				apellido=papellido,
				foto=pfoto
				WHERE id=pid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodasLasPersonas` ()  NO SQL
select * from persona$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUnaPersona` (IN `idp` INT(18))  NO SQL
select * from persona where id =idp$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `dni` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellido`, `dni`, `foto`) VALUES
(6, 'Julieta', 'Roberto', '888888', '888888.jpg'),
(7, 'Tomas', 'Crucero', '777777', '777777.jpg'),
(8, 'Alfredo', 'Mercurio', '999999', '999999.jpg'),
(9, 'Jaime', 'Marrón', '555555', '555555.jpg'),
(10, 'Esteban', 'Trabajos', '111111', '111111.jpg'),
(12, 'Miguel', 'Zorro', '444444', '444444.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
