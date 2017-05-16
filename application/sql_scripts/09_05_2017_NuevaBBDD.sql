db_09_05_2017.sql
DETALLES
ACTIVIDAD
La semana pasada

Juan Quispe ha subido un elemento
9 may.
SQL
db_09_05_2017.sql
No hay actividad registrada antes del 9 de mayo de 2017

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-05-2017 a las 19:22:01
-- Versión del servidor: 5.6.33
-- Versión de PHP: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectodaw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE `city` (
  `cit_PK` int(11) NOT NULL,
  `cit_FK_cou_PK` int(11) NOT NULL,
  `cit_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`cit_PK`, `cit_FK_cou_PK`, `cit_name`) VALUES
(1, 1, 'Madrid'),
(2, 2, 'Londres'),
(3, 3, 'Ámsterdam'),
(4, 4, 'La Patagonia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `cou_PK` int(11) NOT NULL,
  `cou_code` varchar(2) DEFAULT NULL,
  `cou_name` varchar(255) NOT NULL,
  `coud_phone_prefix` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`cou_PK`, `cou_code`, `cou_name`, `coud_phone_prefix`) VALUES
(1, 'ES', 'España ', '+34'),
(2, 'UK', 'Reino Unido', NULL),
(3, 'NL', 'Holanda', NULL),
(4, 'AR', 'Argentina', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE `languages` (
  `lng_PK` int(11) NOT NULL,
  `lng_code` varchar(2) DEFAULT NULL,
  `lng_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`lng_PK`, `lng_code`, `lng_name`) VALUES
(1, 'ES', 'Español'),
(2, 'EN', 'Inglés'),
(3, 'CA', 'Catalán'),
(4, 'RU', 'Ruso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location`
--

CREATE TABLE `location` (
  `loc_PK` int(11) NOT NULL,
  `loc_FK_cit_PK` int(11) NOT NULL,
  `loc_lat` float NOT NULL,
  `loc_lng` float NOT NULL,
  `loc_FK_poi_PK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `points_of_interests`
--

CREATE TABLE `points_of_interests` (
  `poi_PK` int(11) NOT NULL,
  `poi_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `points_of_interests`
--

INSERT INTO `points_of_interests` (`poi_PK`, `poi_name`) VALUES
(1, 'Torre Agbar'),
(2, 'La Puerta del Sol'),
(3, 'La Torre Eiffel'),
(4, 'La Sagrada Familia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `rol_PK` int(11) NOT NULL,
  `rol_name` varchar(255) NOT NULL,
  `rol_enabled` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`rol_PK`, `rol_name`, `rol_enabled`) VALUES
(1, 'Visitante', 1),
(2, 'Usuario', 1),
(3, 'Administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tours`
--

CREATE TABLE `tours` (
  `tur_PK` int(11) NOT NULL,
  `tur_FK_usr_PK` int(11) NOT NULL,
  `tur_name` varchar(255) NOT NULL,
  `tur_createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tur_dt_ini` date DEFAULT NULL,
  `tur_dt_end` date DEFAULT NULL,
  `tur_description` varchar(255) NOT NULL,
  `tur_limit` int(2) NOT NULL,
  `tur_enabled` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `usr_PK` int(11) NOT NULL,
  `usr_FK_rol_PK` int(11) NOT NULL DEFAULT '2',
  `usr_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usr_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usr_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usr_salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usr_createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_modifiedAt` timestamp NULL DEFAULT NULL,
  `usr_birthdate` date DEFAULT NULL,
  `usr_enable` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`usr_PK`, `usr_FK_rol_PK`, `usr_name`, `usr_email`, `usr_password`, `usr_salt`, `usr_createdAt`, `usr_modifiedAt`, `usr_birthdate`, `usr_enable`) VALUES
(17, 2, NULL, 'pepe', '4af4beb64b205a607f7e79e1c6e85a25134df0ba81692f0ab38a9f35c8a82b69', 'bf69c61cc39805466761a55e12af19bd6fad6beff05abdf770b713c03644c664', '2017-05-09 14:51:02', NULL, NULL, 1),
(18, 2, NULL, 'manolo', '46a9c04f428a197a97196c00b787342c9bd40bc9a9ab20f43162e391c6fc63ab', '689e79589b9c4e673b11c13a0e166950f5fa2b15247ad8990c270397a6166b4f', '2017-05-09 16:05:08', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_languages`
--

CREATE TABLE `users_languages` (
  `usl_PK` int(11) NOT NULL,
  `usl_FK_usr_PK` int(11) NOT NULL,
  `usl_FK_lng_PK` int(11) NOT NULL,
  `usl_level` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_tours`
--

CREATE TABLE `users_tours` (
  `ust_PK` int(11) NOT NULL,
  `ust_FK_usr_PK` int(11) NOT NULL,
  `ust_FK_tur_PK` int(11) NOT NULL,
  `ust_dt_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ust_enabled` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cit_PK`),
  ADD KEY `cit_FK_cou_PK` (`cit_FK_cou_PK`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cou_PK`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`lng_PK`);

--
-- Indices de la tabla `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_PK`),
  ADD KEY `loc_FK_cit_PK` (`loc_FK_cit_PK`),
  ADD KEY `loc_FK_poi_PK` (`loc_FK_poi_PK`);

--
-- Indices de la tabla `points_of_interests`
--
ALTER TABLE `points_of_interests`
  ADD PRIMARY KEY (`poi_PK`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`rol_PK`);

--
-- Indices de la tabla `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tur_PK`),
  ADD KEY `tur_FK_usr_PK` (`tur_FK_usr_PK`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_PK`),
  ADD KEY `usr_FK_rol_PK` (`usr_FK_rol_PK`);

--
-- Indices de la tabla `users_languages`
--
ALTER TABLE `users_languages`
  ADD PRIMARY KEY (`usl_PK`),
  ADD KEY `usl_FK_usr_PK` (`usl_FK_usr_PK`),
  ADD KEY `usl_FK_lng_PK` (`usl_FK_lng_PK`);

--
-- Indices de la tabla `users_tours`
--
ALTER TABLE `users_tours`
  ADD PRIMARY KEY (`ust_PK`),
  ADD KEY `ust_FK_usr_PK` (`ust_FK_usr_PK`),
  ADD KEY `ust_FK_tur_PK` (`ust_FK_tur_PK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `city`
--
ALTER TABLE `city`
  MODIFY `cit_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `cou_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
  MODIFY `lng_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `location`
--
ALTER TABLE `location`
  MODIFY `loc_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `points_of_interests`
--
ALTER TABLE `points_of_interests`
  MODIFY `poi_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `rol_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tours`
--
ALTER TABLE `tours`
  MODIFY `tur_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `usr_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `users_languages`
--
ALTER TABLE `users_languages`
  MODIFY `usl_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users_tours`
--
ALTER TABLE `users_tours`
  MODIFY `ust_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`cit_FK_cou_PK`) REFERENCES `country` (`cou_PK`);

--
-- Filtros para la tabla `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`loc_FK_cit_PK`) REFERENCES `city` (`cit_PK`),
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`loc_FK_poi_PK`) REFERENCES `points_of_interests` (`poi_PK`);

--
-- Filtros para la tabla `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`tur_FK_usr_PK`) REFERENCES `users` (`usr_PK`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`usr_FK_rol_PK`) REFERENCES `rols` (`rol_PK`);

--
-- Filtros para la tabla `users_languages`
--
ALTER TABLE `users_languages`
  ADD CONSTRAINT `users_languages_ibfk_1` FOREIGN KEY (`usl_FK_usr_PK`) REFERENCES `users` (`usr_PK`),
  ADD CONSTRAINT `users_languages_ibfk_2` FOREIGN KEY (`usl_FK_lng_PK`) REFERENCES `languages` (`lng_PK`);

--
-- Filtros para la tabla `users_tours`
--
ALTER TABLE `users_tours`
  ADD CONSTRAINT `users_tours_ibfk_1` FOREIGN KEY (`ust_FK_usr_PK`) REFERENCES `users` (`usr_PK`),
  ADD CONSTRAINT `users_tours_ibfk_2` FOREIGN KEY (`ust_FK_tur_PK`) REFERENCES `tours` (`tur_PK`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;