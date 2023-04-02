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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `Nombre` varchar(50) NOT NULL,
  `Grado` varchar(2) NOT NULL,
  `Motivo` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`Nombre`, `Grado`, `Motivo`, `ID`) VALUES
('Daniela', '5A', 'Dificultades en el Lenguaje', 3),
('Camila', '6C', 'No se encuentra alfabetizada', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Grado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`ID`, `Nombre`, `Grado`) VALUES
(9, 'Lucas', '6A'),
(13, 'Marisol', '1C');

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

INSERT INTO `intervenciones-agendadas` (`id`, `title`, `start`) VALUES
(3, 'Turno medico', '2023-03-09 08:00:00'),
(4, 'Licencia por examen', '2023-03-10 13:00:00'),
(5, 'Reunion Red El Martillo', '2023-03-20 10:00:00'),
(8, 'Reunión ED', '2023-03-13 11:00:00'),
(10, 'Plenaria', '2023-03-31 09:00:00'),
(11, 'Licencia', '2023-04-14 13:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervenciones-alumnos`
--

CREATE TABLE `intervenciones-alumnos` (
  `Codigo` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Intervención` text NOT NULL,
  `Alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `intervenciones-alumnos`
--

INSERT INTO `intervenciones-alumnos` (`Codigo`, `Fecha`, `Intervención`, `Alumno`) VALUES
(3, '2023-03-22', 'Cuento \"Las medias de los Flamencos\"', 3),
(5, '2023-03-01', 'Observación Áulica', 3),
(6, '2023-04-03', 'Acompañamiento en aula', 9),
(7, '2023-03-15', 'Lectura guiada', 9),
(8, '2023-03-16', 'Escritura palabras sencillas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervenciones-docentes`
--

CREATE TABLE `intervenciones-docentes` (
  `Codigo` int(11) NOT NULL,
  `Docente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Intervención` text NOT NULL
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
-- Volcado de datos para la tabla `intervenciones-emergentes`
--

INSERT INTO `intervenciones-emergentes` (`ID`, `Fecha`, `Intervencion`) VALUES
(1, '2023-03-20', 'Reunion Red El Martillo'),
(3, '2023-03-15', 'Armado de agenda'),
(4, '2023-03-17', 'Reunión EEE 510'),
(5, '2023-03-31', 'Plenaria'),
(8, '2023-03-21', 'Reunion CAPS El Martillo'),
(9, '2023-02-24', 'Reunión CAPS Santa Rita');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
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
ALTER TABLE `alumnos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
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
