-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2021 a las 19:08:24
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plataformaeducacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(1024) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cantidad_cupos` int(11) NOT NULL,
  `cantidad_inscriptos` int(11) NOT NULL,
  `cantidad_cupos_restantes` int(11) NOT NULL,
  `infoCurso` varchar(2048) NOT NULL,
  `fecha_limite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `fecha_inicio`, `fecha_fin`, `cantidad_cupos`, `cantidad_inscriptos`, `cantidad_cupos_restantes`, `infoCurso`, `fecha_limite`) VALUES
(56, 'Curso primero', '2021-02-26', '2021-02-27', 15, 1, 14, 'Este curso es una propuesta de formación introductoria en temas ambientales para la gestión pública. El recorrido de los contenidos brindará recursos teórico-prácticos que permitan la incorporación de la perspectiva ambiental en la elaboración y gestión de políticas públicas a partir de la compresión de la sustentabilidad como proyecto social.', '2021-02-25'),
(57, 'Segudo N°2', '2021-03-03', '2021-03-03', 5, 3, 2, 'Este encuentro está destinado a establecimientos administrativos y comerciales que generen más de 1000 kg de residuos mensuales, a los profesionales locales inscriptos en Registro Único de Profesionales Ambientales y Administradores de Relaciones (RUPAYAR) y a las Asociaciones Civiles y Cooperativas radicadas en nuestro municipio. La capacitación tiene como objetivo explayar los lineamientos de la resolución y abrir un canal de diálogo para compartir saberes entre las partes involucradas, como los municipios, los generadores especiales, las cámaras de la industria, los comercios, las universidades, los técnicos y las plantas recicladoras. ', '2021-02-28'),
(58, 'cuarto', '2021-02-28', '2021-03-01', 5, 0, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2021-02-27'),
(59, 'quinto', '2021-03-04', '2021-03-05', 10, 0, 10, 'The .collapse class indicates a collapsible elemeLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2021-03-01'),
(60, 'Tercero', '2021-03-06', '2021-03-06', 15, 0, 15, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2021-02-26'),
(61, 'sexto', '2021-03-05', '2021-03-05', 123, 0, 123, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2021-02-27'),
(62, '7mo', '2021-03-06', '2021-03-06', 2, 0, 2, 'asdfghjklñasdfghjklkñasdfghjklñasdfghjklñasdfghjklñasdfghjklñasdfghjklñasdfghjklklñasdfghjklñasdfghjklklñasdflghjksdfghjklkl', '2021-03-06'),
(63, 'hoy2', '2021-03-10', '2021-03-11', 4, 0, 4, 'asdsad', '2021-03-02'),
(64, '10mo', '2021-03-27', '2021-03-27', 2, 0, 2, 'adssad', '2021-03-11'),
(65, '11avo', '2021-03-27', '2021-03-27', 3, 1, 2, 'asdsadsada', '2021-03-11'),
(66, 'otro', '2021-03-29', '2021-03-29', 5, 1, 4, 'info', '2021-03-10'),
(67, 'Campaña de Educación Ambiental. Programa Generación 3R- Resolución 2370/09', '2021-03-18', '2021-03-18', 54, 5, 49, 'En este curso proponemos introducirnos en las principales conceptualizaciones sobre el ambiente y, en particular, en la gestión integral de residuos sólidos urbanos a partir de la problematización de los principales lineamientos que implican las 3R.El objetivo es generar las herramientas necesarias para trasnversalizar contenidos de la gestión de los residuos desde un abordaje integral, a través de un enfoque del ambiente como una construcción compleja y de múltiples dimensiones', '2021-03-17'),
(68, 'ultimo4', '2021-04-01', '2021-04-03', 2, 1, 1, 'asdsadsa', '2021-03-27'),
(69, 'Prueba', '2021-05-01', '2021-05-01', 1, 1, 0, 'Curso de prueba', '2021-04-30'),
(70, 'CURSO ULTIMO', '2021-06-19', '2021-06-26', 10, 5, 5, 'Curso de prueba. Acá va toda la información relacionada al curso a dictarse (la fecha está vigente todavía)', '2021-05-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ocupacion` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_inscripcion` date NOT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `nombre`, `apellido`, `dni`, `email`, `telefono`, `direccion`, `ocupacion`, `empresa`, `fecha_nacimiento`, `fecha_inscripcion`, `idCurso`) VALUES
(244, 'Andres Esteban', 'Perez', 35399666, 'andresfaa.p7@gmail.com', '45345435435', 'asdasda', 'asdsadsa', 'asdsadsa', NULL, '2021-02-25', 56),
(245, 'Andres Esteban', 'Perez', 35399666, 'andresfaa.p7@gmail.com', '2321321', 'dsadsa', 'asdsad', 'asdsad', NULL, '2021-02-26', 57),
(246, 'Gabriel', 'Gabriel', 13000061, 'mail@dominio.com', '24234', 'sad', 'asd', 'asd', NULL, '2021-02-26', 57),
(247, 'Gabriel', 'Gabriel', 13000061, 'otro_mail@dominio.com', '243234', 'sdasad', 'asdsad', 'ads', NULL, '2021-02-26', 57),
(248, 'Andres Esteban', 'Perez', 33333333, 'andresfaa.p7@gmail.com', '234234', 'asdasda', 'dsasasd', 'asd', NULL, '2021-03-11', 65),
(249, 'Andres', 'Perez', 35399666, 'andresfaa.p7@gmail.com', '43543543', 'asdsad', 'asd', 'asd', NULL, '2021-03-12', 66),
(250, 'Andres', 'Andres', 33333333, 'andresfaa.p7@gmail.com', '34234', 'asdsad', 'asd', 'asd', NULL, '2021-03-26', 68),
(251, 'Andres', 'Prueba', 34533333, 'andresfaa.p7@gmail.com', '213143234234', 'adssadsad', 'cargo algo', 'Algo2', NULL, '2021-04-28', 69),
(252, 'Andres', 'Perez', 66666666, 'andresfaa.p@icloud.com', '4543543', 'sdfdsf', 'sdfdsf', 'sdfdsf', NULL, '2021-04-28', 70),
(253, 'Aaaaaaaaaaa', 'Aaaaaaaaaaaaaa', 66666666, 'aaaa@aaa.com', '21322342342', 'sadsadas', 'asdasdsa', 'asdsad', '2021-05-13', '2021-05-06', 70),
(254, 'Bbbbbbbbbbbbbbb', 'Bbbbbbbbbbbbbbbbb', 33333333, '3333@asdsa.com', '45435435', 'sdfds', 'sdf', 'sdfdsf', '1990-02-07', '2021-05-06', 70),
(255, 'Cccccccccccccccccc', 'Cccccccccccccccc', 88888888, '883434@asdsa.com', '324234234', 'sadasd', 'asd', 'fghgfh', '2021-05-04', '2021-05-06', 70),
(256, 'Eeeeeeeeee', 'Eeeeeeeeeeee', 77777777, '7sadsad@gmail.com', '453435435', 'sdfdsf', 'sdfgfhfh', 'fhgfh', '2000-02-09', '2021-05-06', 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcionspecial`
--

CREATE TABLE `inscripcionspecial` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `distrito` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `escuela` varchar(255) NOT NULL,
  `nivel` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `tipogestion` varchar(255) NOT NULL,
  `aniosejercicio` varchar(255) NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripcionspecial`
--

INSERT INTO `inscripcionspecial` (`id`, `nombre`, `apellido`, `dni`, `email`, `telefono`, `genero`, `distrito`, `region`, `escuela`, `nivel`, `cargo`, `tipogestion`, `aniosejercicio`, `fecha_inscripcion`, `idCurso`) VALUES
(259, 'Andres', 'Perez', 35399666, 'andresfaa.p@gmail.com', '4533534543', 'Masculino', 'La plata', 'buenos aires', 'la escuela 10', 'secundario avanzado universitario', 'director de la escuela portero', 'Publica', '10 a 15', '2021-03-12', 67),
(260, 'Otro', 'Ver', 33333333, 'andresfaa.p@icloud.com', '45334543543543543543543535353', 'Masculino', 'adssadsadsadsasdérer ´sd ´sdás´d  we rwerwerwer dsafdsa', 'sasadmlksamdsakmkdslmflkdsmflk mdsfruta de todo psí', 'tildes también', 'algun nvél', 'algod e cargo -10 0 asadsadasdsadsadn   n°', 'Publica', '10 a 15', '2021-03-12', 67),
(261, 'Asdsadsa', 'Asdasdsadad', 44444444, 'andresfaa.p@gmail.com', '534543543543543', 'Otro', 'etertertertertert', 'redfgdfgdfgdfgd', 'dfgdfgdfg', 'ertgegdfgdfgdfgd', 'ertertertertert', 'Privada', 'mas de 15', '2021-03-12', 67),
(262, 'Andres', 'Perez', 33333333, 'andresfaa.p7@gmail.com', '6545645', 'Masculino', 'asd', 'asd', 'asd', 'asd', 'asd', 'Publica', '0 a 5', '2021-03-15', 67),
(263, 'Pepe', 'Pepe', 44444444, 'andresfaa.p@icloud.com', '2432324', 'Masculino', 'adsa', 'asd', 'asd', 'asd', 'asd', 'Publica', '0 a 5', '2021-03-15', 67);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripcionspecial`
--
ALTER TABLE `inscripcionspecial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT de la tabla `inscripcionspecial`
--
ALTER TABLE `inscripcionspecial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
