16_05_17_update.sql
DETALLES
ACTIVIDAD
Hoy

Juan Quispe ha subido un elemento
17:08
SQL
16_05_17_update.sql
No hay actividad registrada antes del 16 de mayo de 2017

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-05-2017 a las 17:07:13
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
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `cat_PK` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`cat_PK`, `cat_name`) VALUES
(1, 'Copas'),
(2, 'Amigos'),
(3, 'Deportes'),
(4, 'Exploración'),
(5, 'Música'),
(6, 'Ocio');

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
  `loc_lat` float NOT NULL,
  `loc_lng` float NOT NULL,
  `loc_place` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `location`
--

INSERT INTO `location` (`loc_PK`, `loc_lat`, `loc_lng`, `loc_place`) VALUES
(30, 41.3995, 2.17855, 'Carrer de Sardenya, 209, 08013 Barcelona, España'),
(31, 41.3945, 2.1819, 'Carrer d\'Alí Bei, 73.X, 08013 Barcelona, España'),
(32, 41.3945, 2.1819, 'Carrer d\'Alí Bei, 73.X, 08013 Barcelona, España'),
(33, 41.3945, 2.1819, 'Carrer d\'Alí Bei, 73.X, 08013 Barcelona, España'),
(34, 41.3977, 2.18516, 'Carrer de Lepant, 135, 08013 Barcelona, España'),
(35, 41.4021, 2.18988, 'Carrer de Bolívia, 31, 08018 Barcelona, España'),
(36, 41.3956, 2.19581, 'Carrer de Llull, 90I, 08005 Barcelona, España'),
(37, 41.3975, 2.1922, 'Carrer d\'Àlaba, 83, 08018 Barcelona, España'),
(38, 41.3975, 2.1922, 'Carrer d\'Àlaba, 83, 08018 Barcelona, España'),
(39, 41.3975, 2.1922, 'Carrer d\'Àlaba, 83, 08018 Barcelona, España'),
(40, 41.3975, 2.1922, 'Carrer d\'Àlaba, 83, 08018 Barcelona, España'),
(41, 41.3975, 2.1922, 'Carrer d\'Àlaba, 83, 08018 Barcelona, España'),
(42, 41.3975, 2.1922, 'Carrer d\'Àlaba, 83, 08018 Barcelona, España'),
(43, 41.3975, 2.1922, 'Carrer d\'Àlaba, 83, 08018 Barcelona, España'),
(44, 41.3975, 2.1922, 'Carrer d\'Àlaba, 83, 08018 Barcelona, España'),
(45, 41.3975, 2.1922, 'Carrer d\'Àlaba, 83, 08018 Barcelona, España'),
(46, 41.3913, 2.19838, 'Carrer de Salvador Espriu, 61, 08005 Barcelona, España'),
(47, 41.3913, 2.19838, 'Carrer de Salvador Espriu, 61, 08005 Barcelona, España'),
(48, 41.3913, 2.19838, 'Carrer de Salvador Espriu, 61, 08005 Barcelona, España'),
(49, 41.4043, 2.19366, 'Àrea Tallers, Avinguda Diagonal, 177, 08018 Barcelona, España'),
(50, 41.3861, 2.19452, 'Av. del Litoral, 8, 08005 Barcelona, España'),
(51, 41.4004, 2.18877, 'Carrer d\'Àlaba, 148, 08018 Barcelona, España'),
(52, 41.3965, 2.18997, 'Carrer dels Almogàvers, 100, 08018 Barcelona, España'),
(53, 41.3965, 2.18997, 'Carrer dels Almogàvers, 100, 08018 Barcelona, España'),
(54, 41.3965, 2.18997, 'Carrer dels Almogàvers, 100, 08018 Barcelona, España'),
(55, 41.3965, 2.18997, 'Carrer dels Almogàvers, 100, 08018 Barcelona, España'),
(56, 41.3965, 2.18997, 'Carrer dels Almogàvers, 100, 08018 Barcelona, España'),
(57, 41.3965, 2.18997, 'Carrer dels Almogàvers, 100, 08018 Barcelona, España'),
(58, 41.3975, 2.19692, 'Carrer de Badajoz, 68, 08005 Barcelona, España'),
(59, 41.3975, 2.19692, 'Carrer de Badajoz, 68, 08005 Barcelona, España'),
(60, 41.4017, 2.20199, 'Carrer de Venero, 8, 08005 Barcelona, España'),
(61, 41.3984, 2.17821, 'Carrer de Sicília, 224, 08013 Barcelona, España'),
(62, 41.3959, 2.19649, 'Carrer d\'Àvila, 49, 08005 Barcelona, España'),
(63, 41.3959, 2.19649, 'Carrer d\'Àvila, 49, 08005 Barcelona, España'),
(64, 41.4021, 2.18637, 'Plaça de les Glòries Catalanes, 4, 08013 Barcelona, España'),
(65, 41.3923, 2.19289, 'Carrer de Ramon Turró, 40, 08005 Barcelona, España'),
(66, 41.3986, 2.20044, 'Carrer de Roc Boronat, 30, 08005 Barcelona, España'),
(67, 41.3961, 2.17898, 'Carrer de Nàpols, 122, 08013 Barcelona, España'),
(68, 41.3883, 2.19357, 'Av. d\'Icària, 119, 08005 Barcelona, España'),
(69, 41.3883, 2.19357, 'Av. d\'Icària, 119, 08005 Barcelona, España'),
(70, 41.3958, 2.18782, 'Carrer de Joan d\'Àustria, 107, 08018 Barcelona, España'),
(71, 41.3958, 2.18782, 'Carrer de Joan d\'Àustria, 107, 08018 Barcelona, España'),
(72, 41.3874, 2.17881, 'Carrer de l\'Arc de Sant Cristòfol, 2, 08003 Barcelona, España'),
(73, 41.3943, 2.19975, 'Av. d\'Icària, 203, 08005 Barcelona, España'),
(74, 41.3943, 2.19975, 'Av. d\'Icària, 203, 08005 Barcelona, España'),
(75, 41.3985, 2.15984, 'Carrer de Francisco Giner, 1, 08012 Barcelona, España');

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
  `tur_FK_loc_PK` int(11) NOT NULL,
  `tur_FK_cat_PK` int(11) NOT NULL,
  `tur_name` varchar(255) NOT NULL,
  `tur_createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tur_dt_ini` timestamp NULL DEFAULT NULL,
  `tur_dt_end` timestamp NULL DEFAULT NULL,
  `tur_description` varchar(255) NOT NULL,
  `tur_limit` int(2) NOT NULL DEFAULT '-1',
  `tur_enabled` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tours`
--

INSERT INTO `tours` (`tur_PK`, `tur_FK_usr_PK`, `tur_FK_loc_PK`, `tur_FK_cat_PK`, `tur_name`, `tur_createdAt`, `tur_dt_ini`, `tur_dt_end`, `tur_description`, `tur_limit`, `tur_enabled`) VALUES
(1, 19, 31, 1, 'dsds', '2017-05-15 18:08:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ssss', -1, 1),
(2, 19, 32, 1, 'dsds', '2017-05-15 18:09:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ssss', -1, 1),
(3, 19, 33, 1, 'dsds', '2017-05-15 18:09:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ssss', -1, 1),
(4, 19, 34, 2, 'dsdsd', '2017-05-15 18:18:29', '2017-05-16 22:00:00', '2017-05-03 22:00:00', 'dsds', -1, 1),
(5, 19, 35, 2, 'dsds', '2017-05-15 18:21:54', '2017-05-09 22:00:00', '2017-05-10 22:00:00', 'dsdsd', -1, 1),
(6, 17, 36, 1, 'Bamo makinah', '2017-05-16 13:40:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Ejemplo', -1, 1),
(7, 17, 37, 2, 'fdfd', '2017-05-16 13:52:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dfsdfd', -1, 1),
(8, 17, 38, 2, 'fdfd', '2017-05-16 13:54:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dfsdfd', -1, 1),
(9, 17, 39, 2, 'fdfd', '2017-05-16 13:55:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dfsdfd', -1, 1),
(10, 17, 40, 2, 'fdfd', '2017-05-16 13:55:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dfsdfd', -1, 1),
(11, 17, 41, 2, 'fdfd', '2017-05-16 13:56:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dfsdfd', -1, 1),
(12, 17, 42, 2, 'fdfd', '2017-05-16 13:57:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dfsdfd', -1, 1),
(13, 17, 43, 2, 'fdfd', '2017-05-16 13:58:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dfsdfd', -1, 1),
(14, 17, 44, 2, 'fdfd', '2017-05-16 13:58:42', '2017-05-16 13:58:42', '0000-00-00 00:00:00', 'dfsdfd', -1, 1),
(15, 17, 45, 2, 'fdfd', '2017-05-16 14:01:57', '2017-05-16 14:01:57', '0000-00-00 00:00:00', 'dfsdfd', -1, 1),
(16, 17, 46, 2, 'dsdsd', '2017-05-16 14:02:58', '2017-05-16 14:02:58', '0000-00-00 00:00:00', 'dsds', -1, 1),
(17, 17, 47, 2, 'dsdsd', '2017-05-16 14:05:07', '2017-05-16 14:05:07', '0000-00-00 00:00:00', 'dsds', -1, 1),
(18, 17, 48, 2, 'dsdsd', '2017-05-16 14:07:30', '2017-05-30 22:00:00', '0000-00-00 00:00:00', 'dsds', -1, 1),
(19, 17, 49, 2, 'fdf', '2017-05-16 14:24:06', '2017-04-15 22:00:00', '0000-00-00 00:00:00', 'dfdf', -1, 1),
(20, 17, 50, 2, 'dfdf', '2017-05-16 14:24:30', '2017-04-15 22:00:00', '0000-00-00 00:00:00', 'dfdf', -1, 1),
(21, 17, 51, 2, 'dsds', '2017-05-16 14:24:56', '2017-04-15 22:00:00', '0000-00-00 00:00:00', 'dvd', -1, 1),
(22, 17, 52, 3, 'fgfg', '2017-05-16 14:26:17', '2017-05-07 22:00:00', '0000-00-00 00:00:00', 'gfdg', -1, 1),
(23, 17, 53, 3, 'fgfg', '2017-05-16 14:26:55', '2017-04-15 22:00:00', '0000-00-00 00:00:00', 'gfdg', -1, 1),
(24, 17, 54, 3, 'fgfg', '2017-05-16 14:27:23', '2017-05-05 22:00:00', '0000-00-00 00:00:00', 'gfdg', -1, 1),
(25, 17, 55, 3, 'fgfg', '2017-05-16 14:27:41', '2017-04-15 22:00:00', '0000-00-00 00:00:00', 'gfdg', -1, 1),
(26, 17, 56, 3, 'fgfg', '2017-05-16 14:28:55', '2017-04-15 22:00:00', '0000-00-00 00:00:00', 'gfdg', -1, 1),
(27, 17, 57, 3, 'fgfg', '2017-05-16 14:29:03', '2017-04-15 22:00:00', '0000-00-00 00:00:00', 'gfdg', -1, 1),
(28, 17, 58, 1, 'sdsd', '2017-05-16 14:30:09', '2017-04-15 22:00:00', '0000-00-00 00:00:00', 'dsd', -1, 1),
(29, 17, 59, 1, 'sdsd', '2017-05-16 14:33:14', '2017-04-15 22:00:00', '0000-00-00 00:00:00', 'dsd', -1, 1),
(30, 19, 60, 2, 'dsd', '2017-05-16 14:33:44', '2017-04-15 22:00:00', '2017-05-07 22:00:00', 'dsdsd', -1, 1),
(31, 19, 61, 2, 'dsd', '2017-05-16 14:33:57', '2017-04-15 22:00:00', '0000-00-00 00:00:00', 'dsdsd', -1, 1),
(32, 19, 62, 1, 'seeds', '2017-05-16 14:34:21', '2017-05-02 22:00:00', '2017-05-10 22:00:00', 'dsds', -1, 1),
(33, 19, 63, 1, 'seeds', '2017-05-16 14:34:31', '2017-05-02 22:00:00', '0000-00-00 00:00:00', 'dsdssds', -1, 1),
(34, 19, 65, 1, 'dsds', '2017-05-16 14:37:35', '2017-04-15 22:00:00', NULL, 'dsdsd', -1, 1),
(35, 19, 66, 2, 'fdf', '2017-05-16 14:38:05', '2017-05-09 22:00:00', NULL, 'pdf', -1, 1),
(36, 19, 67, 1, 'fdfd', '2017-05-16 14:42:16', '2017-05-02 22:00:00', NULL, 'fdfd', -1, 1),
(37, 19, 68, 1, 'dvd', '2017-05-16 14:42:56', '2017-04-15 22:00:00', NULL, 'dsds', -1, 1),
(38, 19, 69, 1, 'dvd', '2017-05-16 14:44:13', '2017-04-15 22:00:00', NULL, 'dsds', -1, 1),
(39, 19, 70, 2, 'dsds', '2017-05-16 14:44:28', '2017-04-15 22:00:00', NULL, 'dsds', -1, 1),
(40, 19, 71, 2, 'dsds', '2017-05-16 14:45:14', '2017-04-15 22:00:00', NULL, 'dsds', -1, 1),
(41, 19, 72, 1, 'fdfd', '2017-05-16 14:45:28', '2017-04-15 22:00:00', NULL, 'fdf', -1, 1),
(42, 19, 73, 1, 'sdsd', '2017-05-16 14:51:09', '2017-04-15 22:00:00', '2017-05-18 22:00:00', 'sdsd', -1, 1),
(43, 19, 74, 3, 'sdsd', '2017-05-16 14:51:48', '2017-04-15 22:00:00', NULL, 'sdsd', -1, 1),
(44, 19, 75, 1, 'FFFF', '2017-05-16 15:00:53', '2017-05-02 22:00:00', '2017-05-15 22:00:00', 'desc', -1, 1);

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
(18, 2, NULL, 'manolo', '46a9c04f428a197a97196c00b787342c9bd40bc9a9ab20f43162e391c6fc63ab', '689e79589b9c4e673b11c13a0e166950f5fa2b15247ad8990c270397a6166b4f', '2017-05-09 16:05:08', NULL, NULL, 1),
(19, 2, NULL, 'juan', 'ebc9eb1315a445230e7d8ea28c75c4108371bba8c98fa63d9d52abdb8b540fff', '157ad3f46f6a70b49c04b0758d3fba4fe3150a8945606d2a3774c2a5531a550b', '2017-05-14 08:53:47', NULL, NULL, 1),
(20, 2, NULL, 'idelfonso', 'd85221b3ab4944dd961b861b644c568ac0ddfdb07da502a3ae24cadbd787f6c7', '37f09f05c4b532cf150cbfb32c8c4cb1eae42d48d7f8274e1ae3bc1681744929', '2017-05-15 07:17:26', NULL, NULL, 1);

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
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_PK`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`lng_PK`);

--
-- Indices de la tabla `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_PK`);

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
  ADD KEY `tur_FK_usr_PK` (`tur_FK_usr_PK`),
  ADD KEY `tur_FK_loc_PK` (`tur_FK_loc_PK`),
  ADD KEY `tur_FK_cat_PK` (`tur_FK_cat_PK`);

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
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
  MODIFY `lng_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `location`
--
ALTER TABLE `location`
  MODIFY `loc_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `rol_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tours`
--
ALTER TABLE `tours`
  MODIFY `tur_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `usr_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
-- Filtros para la tabla `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`tur_FK_usr_PK`) REFERENCES `users` (`usr_PK`),
  ADD CONSTRAINT `tours_ibfk_10` FOREIGN KEY (`tur_FK_cat_PK`) REFERENCES `categories` (`cat_PK`),
  ADD CONSTRAINT `tours_ibfk_11` FOREIGN KEY (`tur_FK_cat_PK`) REFERENCES `categories` (`cat_PK`),
  ADD CONSTRAINT `tours_ibfk_12` FOREIGN KEY (`tur_FK_cat_PK`) REFERENCES `categories` (`cat_PK`),
  ADD CONSTRAINT `tours_ibfk_13` FOREIGN KEY (`tur_FK_cat_PK`) REFERENCES `categories` (`cat_PK`),
  ADD CONSTRAINT `tours_ibfk_2` FOREIGN KEY (`tur_FK_loc_PK`) REFERENCES `location` (`loc_PK`),
  ADD CONSTRAINT `tours_ibfk_3` FOREIGN KEY (`tur_FK_cat_PK`) REFERENCES `categories` (`cat_PK`),
  ADD CONSTRAINT `tours_ibfk_4` FOREIGN KEY (`tur_FK_cat_PK`) REFERENCES `categories` (`cat_PK`),
  ADD CONSTRAINT `tours_ibfk_5` FOREIGN KEY (`tur_FK_cat_PK`) REFERENCES `categories` (`cat_PK`),
  ADD CONSTRAINT `tours_ibfk_6` FOREIGN KEY (`tur_FK_cat_PK`) REFERENCES `categories` (`cat_PK`),
  ADD CONSTRAINT `tours_ibfk_7` FOREIGN KEY (`tur_FK_cat_PK`) REFERENCES `categories` (`cat_PK`),
  ADD CONSTRAINT `tours_ibfk_8` FOREIGN KEY (`tur_FK_cat_PK`) REFERENCES `categories` (`cat_PK`),
  ADD CONSTRAINT `tours_ibfk_9` FOREIGN KEY (`tur_FK_cat_PK`) REFERENCES `categories` (`cat_PK`);

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