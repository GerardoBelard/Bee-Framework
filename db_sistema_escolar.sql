-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2022 a las 03:49:38
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_sistema_escolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `numero` varchar(8) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `horario` varchar(255) DEFAULT NULL,
  `creado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_alumnos`
--

CREATE TABLE `grupos_alumnos` (
  `id` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL DEFAULT 0,
  `id_alumno` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_materias`
--

CREATE TABLE `grupos_materias` (
  `id` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL DEFAULT 0,
  `id_mp` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_materias`
--

CREATE TABLE `grupo_materias` (
  `id` int(15) NOT NULL,
  `id_grupo` int(15) NOT NULL DEFAULT 0,
  `id_materia` int(15) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lecciones`
--

CREATE TABLE `lecciones` (
  `id` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL DEFAULT 0,
  `id_profesor` int(11) NOT NULL DEFAULT 0,
  `titulo` varchar(255) DEFAULT NULL,
  `video` text DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `fecha_disponible` datetime DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `actualizado` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `creado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`, `descripcion`, `creado`) VALUES
(1, 'Basico 1', '', '2022-04-25 16:55:03'),
(2, 'Basico 2', 'DV', '2022-04-25 17:01:24'),
(3, 'basico 595', '', '2022-04-25 17:52:19'),
(4, 'ingles 2', 'contianhucion de niv el duramte 1 mes', '2022-04-25 18:16:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_profesores`
--

CREATE TABLE `materias_profesores` (
  `id` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL DEFAULT 0,
  `id_profesor` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias_profesores`
--

INSERT INTO `materias_profesores` (`id`, `id_materia`, `id_profesor`) VALUES
(4, 3, 47),
(5, 2, 50),
(6, 1, 50),
(7, 4, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `id_ref` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `contenido` longtext DEFAULT NULL,
  `permalink` text DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `actualizado` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `tipo`, `id_ref`, `id_usuario`, `titulo`, `contenido`, `permalink`, `creado`, `actualizado`) VALUES
(1, 'token_recuperacion', 0, 1, 'Token de recuperación de contraseña', 'b89332ab5645ebc2982265a21a8a2018660514d0be7f94f5f0c9a681ba58e540', 'http://localhost:8848/cursos/sistema_escolar/login/password?hook=aprende&action=doing-task&id=1&token=b89332ab5645ebc2982265a21a8a2018660514d0be7f94f5f0c9a681ba58e540', '2021-07-06 16:29:56', NULL),
(3, 'token_recuperacion', 0, 1, 'Token de recuperación de contraseña', '13e4b1fe718c10c4e8f2f97178db03b7766bdbc64c862cfdf84ba37ad4636d43', 'http://localhost/cursos/sistema_escolar/login/password?hook=aprende&action=doing-task&id=1&token=13e4b1fe718c10c4e8f2f97178db03b7766bdbc64c862cfdf84ba37ad4636d43', '2022-04-21 20:12:29', NULL),
(4, 'token_recuperacion', 0, 1, 'Token de recuperación de contraseña', 'd26c33e0eb1c9a3cce4fc0824349f76e896da6b2e72cbf5bf28348d14fcc862c', 'http://localhost/cursos/sistema_escolar/login/password?hook=aprende&action=doing-task&id=1&token=d26c33e0eb1c9a3cce4fc0824349f76e896da6b2e72cbf5bf28348d14fcc862c', '2022-04-21 20:12:33', NULL),
(5, 'token_recuperacion', 0, 1, 'Token de recuperación de contraseña', 'cca22cbb3c8f7c8acb25e300cba3c67020cc8430f268f67064b44c146c524d74', 'http://localhost/cursos/sistema_escolar/login/password?hook=aprende&action=doing-task&id=1&token=cca22cbb3c8f7c8acb25e300cba3c67020cc8430f268f67064b44c146c524d74', '2022-04-21 20:12:37', NULL),
(6, 'token_recuperacion', 0, 1, 'Token de recuperación de contraseña', 'd9063b713aa6d01b750601e1ffdf8b2fc32fed1b0877e764f584606123b514b4', 'http://localhost/cursos/sistema_escolar/login/password?hook=aprende&action=doing-task&id=1&token=d9063b713aa6d01b750601e1ffdf8b2fc32fed1b0877e764f584606123b514b4', '2022-04-21 20:12:42', NULL),
(7, 'token_recuperacion', 0, 1, 'Token de recuperación de contraseña', '15eba4851781ebb223fa7fdfc582b2abe780ffc2624f7549494ae5dd72b5cc98', 'http://localhost/cursos/sistema_escolar/login/password?hook=aprende&action=doing-task&id=1&token=15eba4851781ebb223fa7fdfc582b2abe780ffc2624f7549494ae5dd72b5cc98', '2022-04-21 20:12:46', NULL),
(8, 'token_recuperacion', 0, 1, 'Token de recuperación de contraseña', '834bd2bec0b3bdc8e4a68850023df12424cb9f3d2e4d72e99a78ae0d0d47b910', 'http://localhost/cursos/sistema_escolar/login/password?hook=aprende&action=doing-task&id=1&token=834bd2bec0b3bdc8e4a68850023df12424cb9f3d2e4d72e99a78ae0d0d47b910', '2022-04-21 20:12:50', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `numero` varchar(8) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `nombre_completo` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `actualizado` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `numero`, `nombres`, `apellidos`, `nombre_completo`, `email`, `password`, `telefono`, `hash`, `rol`, `status`, `creado`, `actualizado`) VALUES
(1, '112233', 'Administracion', 'CLE', 'Administracion CLE', 'cle@gamadero.tecnm.mx', '$2y$10$5O.0Nqod79ME0AfQeEIE0O2sfDwdoHo.uM/kWL4Xn0paauQNjwTH.', '1122334455', '111', 'admin', 'activo', '2022-04-04 17:51:00', '2022-04-25 20:54:07'),
(45, '768664', 'Julio Arturo', 'Herrera Arias', 'Julio Arturo Herrera Arias', 'HHH@GMAIL.COM', '$2y$10$7xPdEBaTJ4faKkLOEZJYR.qxn3CxOquslTBF8rgCfgDe8sux2EbO2', '55 4621 7448', 'fbdd24820e3fef13ca7218c43295e805861d2472b08925b02656067560363508', 'profesor', 'suspendido', '2022-04-25 16:54:17', '2022-04-25 22:23:32'),
(47, '280743', 'ALONDRA', 'Hidalgo Cordero', 'ALONDRA Hidalgo Cordero', 'cle_06@gamadero.tecnm.com', '$2y$10$Tt/IXr/Ho4OKYn9v3A0oYusKebVzl2XkR1GatTxSHQ0mQoqj5fjZu', '111111', '783b4027c8807ae83bb2c0b3bf34f44fd5327e732a7efa32e57bc795bb9f5b91', 'profesor', 'pendiente', '2022-04-25 16:59:27', '2022-04-25 23:22:53'),
(50, '593563', 'GERARDITO', 'BELARD', 'GERARDITO BELARD', 'AMOALAMEMA@GMAIL.COM', '$2y$10$8N1M4PqV8SeXrXk6f6GVPeW4bFeHF6qwzRrOjEQS3gUBA0VswPLOW', '55214854811', 'ec5376ff5a0822b1e2e5f9a0f5e9b081fa8fb7cb6407b89a797e64b213d64823', 'profesor', 'pendiente', '2022-04-25 18:14:21', '2022-04-25 23:15:23'),
(171130300, '17113030', 'Orlando', 'Arroyo Ortega', 'Orlando Arroyo Ortega', 'orlando@gmail.com', 'hola', '13132046', NULL, 'alumno', 'suspendido', '2022-04-25 19:26:01', '2022-04-26 01:40:49');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos_alumnos`
--
ALTER TABLE `grupos_alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos_materias`
--
ALTER TABLE `grupos_materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_materias`
--
ALTER TABLE `grupo_materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias_profesores`
--
ALTER TABLE `materias_profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grupos_alumnos`
--
ALTER TABLE `grupos_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `grupos_materias`
--
ALTER TABLE `grupos_materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `grupo_materias`
--
ALTER TABLE `grupo_materias`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias_profesores`
--
ALTER TABLE `materias_profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171130301;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
