-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2022 a las 23:36:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `brumdb`
--
CREATE DATABASE IF NOT EXISTS `brumdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `brumdb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ads`
--

CREATE TABLE `ads` (
  `idPublicidad` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `adName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ads`
--

INSERT INTO `ads` (`idPublicidad`, `image_url`, `adName`) VALUES
(41, 'IMG-636ec5cb656591.37929190.png', 'Ad1'),
(42, 'IMG-636ec5d13a3254.34423085.png', 'Ad2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `idEquipo` int(11) NOT NULL,
  `idDeporte` int(11) NOT NULL,
  `nEquipo` varchar(255) NOT NULL,
  `teamimg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`idEquipo`, `idDeporte`, `nEquipo`, `teamimg`) VALUES
(74, 29, 'TEST', 'IMG-636e5fe8f03108.65299923.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_partido`
--

CREATE TABLE `equipo_partido` (
  `idEquipo` int(11) NOT NULL,
  `idPartido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `idDeporte` int(11) DEFAULT NULL,
  `nEvento` varchar(256) NOT NULL,
  `lugar` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_equipo`
--

CREATE TABLE `evento_equipo` (
  `idEvento` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_jugador`
--

CREATE TABLE `evento_jugador` (
  `idEvento` int(11) NOT NULL,
  `idJugador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_partido`
--

CREATE TABLE `evento_partido` (
  `idEvento` int(11) NOT NULL,
  `idPartido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `idIncidencia` int(11) NOT NULL,
  `idPartido` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `nIncidencia` varchar(255) NOT NULL,
  `tiempo` varchar(255) NOT NULL DEFAULT '00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `idJugador` int(11) NOT NULL,
  `nJugador` varchar(255) NOT NULL,
  `aJugador` varchar(255) NOT NULL,
  `idDeporte` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores_equipo`
--

CREATE TABLE `jugadores_equipo` (
  `idJugador` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores_partido`
--

CREATE TABLE `jugadores_partido` (
  `idJugador` int(11) NOT NULL,
  `idPartido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE `partido` (
  `idPartido` int(11) NOT NULL,
  `idDeporte` int(11) NOT NULL,
  `nPartido` varchar(255) NOT NULL,
  `nArbitro` varchar(255) NOT NULL,
  `lugar` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido_resultado`
--

CREATE TABLE `partido_resultado` (
  `idPartido` int(11) NOT NULL,
  `idResultado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE `resultado` (
  `idResultado` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `anotacion` int(255) DEFAULT NULL,
  `tLlegada` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`idResultado`, `idEquipo`, `anotacion`, `tLlegada`) VALUES
(12, 74, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sports`
--

CREATE TABLE `sports` (
  `idDeporte` int(11) NOT NULL,
  `nDeporte` text NOT NULL,
  `tDeporte` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sports`
--

INSERT INTO `sports` (`idDeporte`, `nDeporte`, `tDeporte`) VALUES
(28, 'Futbol', 'team'),
(29, 'Volleyball', 'team'),
(30, 'Basketball', 'team'),
(32, 'Formula 1', 'ind');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(110) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipousuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `email`, `password`, `tipousuario`) VALUES
(37, 'usuario1@uno', 'user1', 1),
(38, 'usuario@dos', 'user2', 0),
(39, 'usuario@tres', 'user3', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`idPublicidad`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`idEquipo`),
  ADD KEY `idDeporte` (`idDeporte`);

--
-- Indices de la tabla `equipo_partido`
--
ALTER TABLE `equipo_partido`
  ADD PRIMARY KEY (`idEquipo`,`idPartido`),
  ADD KEY `idPartido` (`idPartido`),
  ADD KEY `idPartido_2` (`idPartido`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `idDeporte` (`idDeporte`);

--
-- Indices de la tabla `evento_equipo`
--
ALTER TABLE `evento_equipo`
  ADD PRIMARY KEY (`idEvento`,`idEquipo`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indices de la tabla `evento_jugador`
--
ALTER TABLE `evento_jugador`
  ADD PRIMARY KEY (`idEvento`,`idJugador`),
  ADD KEY `idJugador` (`idJugador`);

--
-- Indices de la tabla `evento_partido`
--
ALTER TABLE `evento_partido`
  ADD PRIMARY KEY (`idEvento`,`idPartido`),
  ADD KEY `idPartido` (`idPartido`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`idIncidencia`),
  ADD KEY `idPartido` (`idPartido`,`idEquipo`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`idJugador`),
  ADD KEY `idDeporte` (`idDeporte`);

--
-- Indices de la tabla `jugadores_equipo`
--
ALTER TABLE `jugadores_equipo`
  ADD PRIMARY KEY (`idJugador`,`idEquipo`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indices de la tabla `jugadores_partido`
--
ALTER TABLE `jugadores_partido`
  ADD PRIMARY KEY (`idJugador`,`idPartido`),
  ADD KEY `idPartido` (`idPartido`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`idPartido`);

--
-- Indices de la tabla `partido_resultado`
--
ALTER TABLE `partido_resultado`
  ADD PRIMARY KEY (`idPartido`,`idResultado`),
  ADD KEY `idResultado` (`idResultado`);

--
-- Indices de la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`idResultado`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indices de la tabla `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`idDeporte`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ads`
--
ALTER TABLE `ads`
  MODIFY `idPublicidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4151;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `idIncidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `idJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `idPartido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `resultado`
--
ALTER TABLE `resultado`
  MODIFY `idResultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `sports`
--
ALTER TABLE `sports`
  MODIFY `idDeporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`idDeporte`) REFERENCES `sports` (`idDeporte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo_partido`
--
ALTER TABLE `equipo_partido`
  ADD CONSTRAINT `equipo_partido_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_partido_ibfk_2` FOREIGN KEY (`idPartido`) REFERENCES `partido` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`idDeporte`) REFERENCES `sports` (`idDeporte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento_equipo`
--
ALTER TABLE `evento_equipo`
  ADD CONSTRAINT `evento_equipo_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evento_equipo_ibfk_2` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento_jugador`
--
ALTER TABLE `evento_jugador`
  ADD CONSTRAINT `evento_jugador_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evento_jugador_ibfk_2` FOREIGN KEY (`idJugador`) REFERENCES `jugadores` (`idJugador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento_partido`
--
ALTER TABLE `evento_partido`
  ADD CONSTRAINT `evento_partido_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evento_partido_ibfk_2` FOREIGN KEY (`idPartido`) REFERENCES `partido` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`idPartido`) REFERENCES `partido` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incidencias_ibfk_2` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`idDeporte`) REFERENCES `sports` (`idDeporte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jugadores_equipo`
--
ALTER TABLE `jugadores_equipo`
  ADD CONSTRAINT `jugadores_equipo_ibfk_1` FOREIGN KEY (`idJugador`) REFERENCES `jugadores` (`idJugador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jugadores_equipo_ibfk_2` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jugadores_partido`
--
ALTER TABLE `jugadores_partido`
  ADD CONSTRAINT `jugadores_partido_ibfk_1` FOREIGN KEY (`idJugador`) REFERENCES `jugadores` (`idJugador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jugadores_partido_ibfk_2` FOREIGN KEY (`idPartido`) REFERENCES `partido` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `partido_resultado`
--
ALTER TABLE `partido_resultado`
  ADD CONSTRAINT `partido_resultado_ibfk_1` FOREIGN KEY (`idPartido`) REFERENCES `partido` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partido_resultado_ibfk_2` FOREIGN KEY (`idResultado`) REFERENCES `resultado` (`idResultado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `resultado_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`idEquipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
