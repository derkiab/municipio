-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2022 a las 14:43:47
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
-- Estructura de tabla para la tabla `category_places_of_interest`
--

CREATE TABLE `category_places_of_interest` (
  `id_category` int(11) NOT NULL,
  `name_category` text NOT NULL,
  `icon_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estructura de tabla para la tabla `entrepreneurs`
--

CREATE TABLE `entrepreneurs` (
  `id_entrepreneur` int(11) NOT NULL,
  `rut_entrepreneur` int(11) NOT NULL,
  `name_entrepreneur` varchar(500) NOT NULL,
  `address_entrepreneur` text NOT NULL,
  `phone_entrepreneur` int(11) NOT NULL,
  `email_entrepreneur` varchar(255) NOT NULL,
  `name_company` varchar(50) NOT NULL,
  `social_networks_entrepreneur` text NOT NULL,
  `field_entrepreneur` varchar(255) NOT NULL,
  `image_entrepreneur` varchar(255) NOT NULL,
  `description_entrepreneur` text NOT NULL,
  `state_entrepreneur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrepreneurs`
--

INSERT INTO `entrepreneurs` (`id_entrepreneur`, `rut_entrepreneur`, `name_entrepreneur`, `address_entrepreneur`, `phone_entrepreneur`, `email_entrepreneur`, `name_company`, `social_networks_entrepreneur`, `field_entrepreneur`, `image_entrepreneur`, `description_entrepreneur`, `state_entrepreneur`) VALUES
(1, 201938759, 'Ignacia Rodriguez Luengo', 'local falso #123 ', 72219603, 'correofalso@123.com', 'PinkyLaboratory', '@michi_bonito\r\nmichis\r\n', 'articulos para mascotas', 'https://ae01.alicdn.com/kf/H4ccb7c668af549b78668483829fa78e8d/Correa-ajustable-para-h-mster-arn-s-suave-para-mascota-peque-a-p-jaro-loro-rat.jpg_Q90.jpg_.webp', 'somos una pequeña tienda de articulos para tu linda mmascota, tenemos de tomo u pooc de lo que puede necesitar tu mascota', 'Aceptada'),
(2, 200197593, 'Nicolas Cereceda Squella', 'Casa Nico', 1233457982, 'correonico@falso.com', 'la wena wena', 'redes sociales falsa 123', 'Ventas de articulos alimenticios', 'https://comidaschilenas.com/wp-content/uploads/2019/02/Receta-del-completo-italiano.jpg', 'Somos una Empresa pequeña pero vendemos completos grandes', 'Rechazada');

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
(2, '2023-03-25', '20:00:00', 'Los Bunkers', 'La banda regresa a la ciudad sureña con un show masivo en el Estadio Ester Roa Rebolledo (Collao), el sábado 25 de marzo de 2023. \"Ven Aquí\" es el nombre de la serie de shows con que la banda...Leer más sobre Radio Usach', 'https://images.sk-static.com/images/media/profile_images/artists/138900/huge_avatar', 1),
(3, '2022-12-23', '16:00:00', 'Senderismo histórico Cerro Caracol en Parque Ecuador', 'Caupolicán 450, Concepción Hey que gusto que estés en mi perfil, soy Antonio y he tenido la oportunidad de viajar a varios países y tomar tours y actividades turísticas. Gracias a esto he recopilado lo mejor de mis viajes para enseñarte hoy mi ciudad de manera divertida, interesante y muy social. Amo hacer nuevos amigos, enseñar la importancia de nuestro entorno y hacer un turismo sostenible y dejar un hermosa huella en sus corazones. ¡Mi sueño es hacer de mi ciudad un polo turístico potente!', 'https://media.guruwalk.com/nlnqpeca36fvtroervykrfpxy0zg', 1),
(4, '2022-12-23', '20:05:00', 'KAKOAMEDIA Y MALDITO GORDO ESPECIAL NAVIDAD ', '  Ven a celebrar junto a esta dupla una previa a la navidad totalmente diferente a lo antes visto, amigo secreto, dinámicas y webeo es lo que define a este show !! ', 'https://www.comediaticket.cl/wp-content/uploads/2022/12/kakoamedia-y-maldito-gordo-especial-navidad.jpg', 1),
(5, '2022-12-19', '12:07:00', '¡Resuelve tus dudas en nuestro Centro de Atención al Postulante (CAP)! ', 'Nuestro equipo de Admisión estará disponible para apoyarte con tus dudas sobre el Proceso de Admisión 2023 en las sedes de Santiago (Av. Plaza 680, Las Condes) y Concepción (Ainavillo 456...Leer más sobre Universidad del Desarrollo ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAJvvKe6GMVZfvBVB9xyyWxZPJnkLutFHMKGAzzaKe2MbI40Gv-WL70-n4_g&s=10', 3);

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
(2, '2022-12-18', '21:56:00', 'Incendios forestales: Onemi informa que seis comunas se encuentran en Alerta Roja y hay 9 siniestros que se mantienen en combate', 'De acuerdo a su director (s), Mauricio Tapia, en las últimas horas se lograron extinguir 17 incendios, mientras que 38 se encuentran controlados. Del mismo modo, indicó que seis comunas se encuentran en Alerta Roja, tres en la Región de Valparaíso y otras tres en la Metropolitana. Las comunas corresponden a Quilpué, Villa Alemana, Santo Domingo, Isla de Pascua, Curacaví, Lampa y San Pedro. \"Para atender estas emergencias se encuentran en terreno todos los recursos desplegados, en coordinación con los niveles locales y regionales\", señaló.', 'https://media.elmostrador.cl/2022/12/A_UNO_1420816-700x467.jpg', 1),
(10, '2022-12-15', '22:43:00', 'Harry y Meghan serán invitados a la coronación de Carlos III, según diario británico', 'Los duques de Sussex, Harry y Meghan, serán invitados al acto de coronación del rey Carlos III el año que viene, pese a las críticas vertidas contra la Familia Real en el documental que realizaron para Netflix, según informó este sábado el \"Daily Telegraph\".  Fuentes del Palacio de Buckingham explicaron al diario que la pareja podrá participar en el evento, previsto para el 6 de mayo, si así lo desea.  De la misma forma, el palacio no tiene la intención de responder a las acusaciones que los Sussex lanzan en el documental ni tampoco de despojar a Enrique y Meghan del ducado, como piden algunas voces.', 'https://www.24horas.cl/24horas/site/artic/20221217/imag/foto_0000000220221217063851/a1e5c80df714bbd1ca2e58c3e991fb19883784bbw.jpg', 2),
(14, '2022-12-17', '06:24:00', 'Twitter: Elon Musk dice que restaurará cuentas suspendidas de periodistas', 'Elon Musk dijo el viernes (16.12.2022) por la noche que restaurará las cuentas de Twitter de varios periodistas que la red social había suspendido por supuestamente poner en peligro a la familia del empresario.  \"La gente ha hablado. Las cuentas que revelaron mi ubicación verán ahora la suspensión levantada\", dijo el magnate después del revuelo causado por su decisión. Musk había organizado una encuesta en Twitter preguntando a las personas usuarias si debía rehabilitar las cuentas ahora o en una semana. Casi el 59% de los 3,69 millones de participantes votaron por hacerlo inmediatamente.  El empresario provocó advertencias de la Unión Europea y Naciones Unidas tras suspender las cuentas de más de media docena de periodistas, algunos de medios como CNN, The New York Times o The Washington Post. ', 'https://www.24horas.cl/24horas/site/artic/20221217/imag/foto_0000000220221217062822/63961558_303.jpeg', 1);

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
  `category_place` int(11) NOT NULL,
  `name_place` text NOT NULL,
  `latitude_place` float NOT NULL,
  `longitude_place` float NOT NULL
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
(2, 1234989456, 'derki', 'userlastname', 'derquis96@gmail.com', 1, 12345, '123', 'casa derki'),
(3, 2, 'Juan', 'Baeza', 'usertest@test.com', 1, 9999999, '123', 'casas del juan'),
(7, 201938759, 'ignacia', 'rodriguez', 'irodriguelu@ign.ucsc.cl', 1, 9999999, '54321', 'casa nacha'),
(8, 2147483647, 'Diego', 'San Martin', 'dsanmartin@ing.ucsc.cl', 2, 1234567, '54321', 'casa diego');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category_places_of_interest`
--
ALTER TABLE `category_places_of_interest`
  ADD PRIMARY KEY (`id_category`);

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
-- Indices de la tabla `entrepreneurs`
--
ALTER TABLE `entrepreneurs`
  ADD PRIMARY KEY (`id_entrepreneur`);

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
  ADD PRIMARY KEY (`id_place`),
  ADD KEY `category_place_fk` (`category_place`);

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
-- AUTO_INCREMENT de la tabla `category_places_of_interest`
--
ALTER TABLE `category_places_of_interest`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `entrepreneurs`
--
ALTER TABLE `entrepreneurs`
  MODIFY `id_entrepreneur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `participates_FK` FOREIGN KEY (`id_entrepeneur`) REFERENCES `entrepreneurs` (`id_entrepreneur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participates_FK_1` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `places_of_interest`
--
ALTER TABLE `places_of_interest`
  ADD CONSTRAINT `category_place_fk` FOREIGN KEY (`category_place`) REFERENCES `category_places_of_interest` (`id_category`);

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
