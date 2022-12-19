-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2022 a las 07:47:15
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
-- Base de datos: `municipio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentaries`
--

CREATE TABLE `commentaries` (
  `id_commentary` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `commentary_content` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contribution_types`
--

CREATE TABLE `contribution_types` (
  `id_contribution_type` int(11) NOT NULL,
  `name_contribution_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contribution_types`
--

INSERT INTO `contribution_types` (`id_contribution_type`, `name_contribution_type`) VALUES
(1, 'Opinion'),
(2, 'Reclamo'),
(3, 'Denuncia'),
(4, 'Agradecimiento'),
(5, 'Consulta'),
(6, 'Sugerencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE `departments` (
  `id_department` int(11) NOT NULL,
  `name_department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id_department`, `name_department`) VALUES
(1, 'Departamento de tesoreria'),
(2, 'Departamento de salud'),
(3, 'Departamento de licencias de conducir'),
(4, 'Departamento de bienestar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrepeneurs`
--

CREATE TABLE `entrepeneurs` (
  `id_entrepeneur` int(11) NOT NULL,
  `rut_entrepeneur` int(11) NOT NULL,
  `name_entrepeneur` varchar(500) NOT NULL,
  `address_entrepeneur` text NOT NULL,
  `phone_entrepeneur` int(11) NOT NULL,
  `email_entrepeneur` varchar(255) NOT NULL,
  `social_networks_entrepeneur` text NOT NULL,
  `field_entrepeneur` varchar(255) NOT NULL,
  `image_entrepeneur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `date_event` date NOT NULL,
  `time_event` time NOT NULL,
  `title_event` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `id_status_event` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id_event`, `date_event`, `time_event`, `title_event`, `event_description`, `event_image`, `id_status_event`) VALUES
(2, '2022-12-15', '19:25:00', 'michitos', 'la pelusa la gata mas bella de la vida ', 'https://i.pinimg.com/736x/e0/c0/a4/e0c0a4aab16f04f250f4cc6b7946cf9d.jpg', 2),
(3, '2022-12-15', '19:25:00', 'michis felices', 'la pelusa la gata mas bella de la vida ', 'https://i.pinimg.com/736x/e0/c0/a4/e0c0a4aab16f04f250f4cc6b7946cf9d.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `date_news` date NOT NULL,
  `time_news` time NOT NULL,
  `title_news` varchar(255) NOT NULL,
  `news_description` text NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `id_status_news` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id_news`, `date_news`, `time_news`, `title_news`, `news_description`, `news_image`, `id_status_news`) VALUES
(1, '2022-12-07', '15:15:00', 'michis de hasmterdar', 'michis de hamsterdas se divorcian', 'https://img.freepik.com/foto-gratis/gato-rojo-o-blanco-i-estudio-blanco_155003-13189.jpg?w=2000', 2),
(8, '2022-12-17', '12:12:00', 'michis de hasmterdar', 'michis de hamsterdas se divorcian', 'https://img.freepik.com/foto-gratis/gato-rojo-o-blanco-i-estudio-blanco_155003-13189.jpg?w=2000', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinions`
--

CREATE TABLE `opinions` (
  `id_opinion` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `opinion_description` text NOT NULL,
  `opinion_image` varchar(255) NOT NULL,
  `department` int(255) NOT NULL,
  `id_type_contribution` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `opinions`
--

INSERT INTO `opinions` (`id_opinion`, `id_user`, `opinion_description`, `opinion_image`, `department`, `id_type_contribution`, `answer`) VALUES
(41, 3, 'reclamo saluud', '', 2, 2, ''),
(42, 3, 'te denuncio', '', 3, 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participates`
--

CREATE TABLE `participates` (
  `id_entrepeneur` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `places_of_interest`
--

CREATE TABLE `places_of_interest` (
  `id_place` int(11) NOT NULL,
  `category_place` text NOT NULL,
  `name_place` text NOT NULL,
  `latitude_place` varchar(255) NOT NULL,
  `longitude_place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedures`
--

CREATE TABLE `procedures` (
  `id_procedure` int(11) NOT NULL,
  `type_procedure` text NOT NULL,
  `type_certificate` text NOT NULL,
  `date_reserved` date NOT NULL,
  `time_reserved` time NOT NULL,
  `department` text NOT NULL,
  `type_public_information` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publishes_in`
--

CREATE TABLE `publishes_in` (
  `id_commentary` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_news` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requests`
--

CREATE TABLE `requests` (
  `id_procedure` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_nombre`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_events`
--

CREATE TABLE `status_events` (
  `id_status_event` int(12) NOT NULL,
  `status_event_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `status_events`
--

INSERT INTO `status_events` (`id_status_event`, `status_event_name`) VALUES
(1, 'Próximamente'),
(2, 'En curso'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_news`
--

CREATE TABLE `status_news` (
  `id_status_news` int(30) NOT NULL,
  `status_news_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `status_news`
--

INSERT INTO `status_news` (`id_status_news`, `status_news_name`) VALUES
(1, 'En curso'),
(2, 'Finalizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `rut_user` int(9) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `lastname_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `phone_user` int(50) NOT NULL,
  `password_user` varchar(8) NOT NULL,
  `address_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `rut_user`, `name_user`, `lastname_user`, `email_user`, `rol_id`, `phone_user`, `password_user`, `address_user`) VALUES
(2, 123456789, 'Derqui', 'Sanhueza', 'derquis96@gmail.com', 1, 963434488, '12345', 'dir1'),
(3, 987654321, 'Diego', 'San Martin', 'dsanmartin@ing.ucsc.cl', 2, 1234567, '54321', 'dir2'),
(7, 989898989, 'usertest', 'userlastname', 'usertest@test.com', 2, 9999999, '123', 'address2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `commentaries`
--
ALTER TABLE `commentaries`
  ADD PRIMARY KEY (`id_commentary`),
  ADD KEY `commentaries_FK` (`id_user`);

--
-- Indices de la tabla `contribution_types`
--
ALTER TABLE `contribution_types`
  ADD PRIMARY KEY (`id_contribution_type`);

--
-- Indices de la tabla `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id_department`);

--
-- Indices de la tabla `entrepeneurs`
--
ALTER TABLE `entrepeneurs`
  ADD PRIMARY KEY (`id_entrepeneur`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_status_event` (`id_status_event`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `id_status_news` (`id_status_news`);

--
-- Indices de la tabla `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id_opinion`),
  ADD KEY `opinions_FK` (`id_user`),
  ADD KEY `opinions_FK_1` (`department`),
  ADD KEY `opinions_FK_2` (`id_type_contribution`);

--
-- Indices de la tabla `participates`
--
ALTER TABLE `participates`
  ADD PRIMARY KEY (`id_event`,`id_entrepeneur`),
  ADD KEY `participates_FK` (`id_entrepeneur`);

--
-- Indices de la tabla `places_of_interest`
--
ALTER TABLE `places_of_interest`
  ADD PRIMARY KEY (`id_place`);

--
-- Indices de la tabla `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`id_procedure`);

--
-- Indices de la tabla `publishes_in`
--
ALTER TABLE `publishes_in`
  ADD PRIMARY KEY (`id_commentary`,`id_event`,`id_news`),
  ADD KEY `publishes_in_FK_1` (`id_event`),
  ADD KEY `publishes_in_FK_2` (`id_news`);

--
-- Indices de la tabla `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id_procedure`,`id_user`),
  ADD KEY `requests_FK` (`id_user`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `status_events`
--
ALTER TABLE `status_events`
  ADD PRIMARY KEY (`id_status_event`);

--
-- Indices de la tabla `status_news`
--
ALTER TABLE `status_news`
  ADD PRIMARY KEY (`id_status_news`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `rut_user` (`rut_user`),
  ADD KEY `users_FK` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `commentaries`
--
ALTER TABLE `commentaries`
  MODIFY `id_commentary` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contribution_types`
--
ALTER TABLE `contribution_types`
  MODIFY `id_contribution_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `departments`
--
ALTER TABLE `departments`
  MODIFY `id_department` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrepeneurs`
--
ALTER TABLE `entrepeneurs`
  MODIFY `id_entrepeneur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id_opinion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `places_of_interest`
--
ALTER TABLE `places_of_interest`
  MODIFY `id_place` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `procedures`
--
ALTER TABLE `procedures`
  MODIFY `id_procedure` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `status_events`
--
ALTER TABLE `status_events`
  MODIFY `id_status_event` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `status_news`
--
ALTER TABLE `status_news`
  MODIFY `id_status_news` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `commentaries`
--
ALTER TABLE `commentaries`
  ADD CONSTRAINT `commentaries_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opinions`
--
ALTER TABLE `opinions`
  ADD CONSTRAINT `opinions_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opinions_FK_1` FOREIGN KEY (`department`) REFERENCES `departments` (`id_department`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opinions_FK_2` FOREIGN KEY (`id_type_contribution`) REFERENCES `contribution_types` (`id_contribution_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `participates`
--
ALTER TABLE `participates`
  ADD CONSTRAINT `participates_FK` FOREIGN KEY (`id_entrepeneur`) REFERENCES `entrepeneurs` (`id_entrepeneur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participates_FK_1` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publishes_in`
--
ALTER TABLE `publishes_in`
  ADD CONSTRAINT `publishes_in_FK` FOREIGN KEY (`id_commentary`) REFERENCES `commentaries` (`id_commentary`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publishes_in_FK_1` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publishes_in_FK_2` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_FK_1` FOREIGN KEY (`id_procedure`) REFERENCES `procedures` (`id_procedure`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_FK` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`rol_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
