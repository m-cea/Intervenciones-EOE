-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2023 a las 19:39:02
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
-- Base de datos: `oe`
--
CREATE DATABASE oe;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `Alumnos` (
  `Nombre` varchar(50) NOT NULL,
  `Grado` varchar(2) NOT NULL,
  `Motivo` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `Docentes` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Grado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervenciones-agendadas`
--

CREATE TABLE `intervenciones-agendadas` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `start` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `intervenciones-agendadas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervenciones-alumnos`
--

CREATE TABLE `intervenciones-alumnos` (
  `Codigo` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Intervencion` text NOT NULL,
  `Alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura de tabla para la tabla `intervenciones-docentes`
--

CREATE TABLE `intervenciones-docentes` (
  `Codigo` int(11) NOT NULL,
  `Docente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Intervencion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `intervenciones-docentes`
--

INSERT INTO `intervenciones-docentes` (`Codigo`, `Docente`, `Fecha`, `Intervención`) VALUES
(15, 9, '2023-03-29', 'Pregunta restricciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervenciones-emergentes`
--

CREATE TABLE `intervenciones-emergentes` (
  `ID` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Intervencion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `Alumnos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `Docentes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `intervenciones-agendadas`
--
ALTER TABLE `intervenciones-agendadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `intervenciones-alumnos`
--
ALTER TABLE `intervenciones-alumnos`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Alumno` (`Alumno`);

--
-- Indices de la tabla `intervenciones-docentes`
--
ALTER TABLE `intervenciones-docentes`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Docente` (`Docente`);

--
-- Indices de la tabla `intervenciones-emergentes`
--
ALTER TABLE `intervenciones-emergentes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `Alumnos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `Docentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `intervenciones-agendadas`
--
ALTER TABLE `intervenciones-agendadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `intervenciones-alumnos`
--
ALTER TABLE `intervenciones-alumnos`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `intervenciones-docentes`
--
ALTER TABLE `intervenciones-docentes`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `intervenciones-emergentes`
--
ALTER TABLE `intervenciones-emergentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `intervenciones-alumnos`
--
ALTER TABLE `intervenciones-alumnos`
  ADD CONSTRAINT `intervenciones-alumnos_ibfk_1` FOREIGN KEY (`Alumno`) REFERENCES `alumnos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `intervenciones-docentes`
--
ALTER TABLE `intervenciones-docentes`
  ADD CONSTRAINT `intervenciones-docentes_ibfk_1` FOREIGN KEY (`Docente`) REFERENCES `docentes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
