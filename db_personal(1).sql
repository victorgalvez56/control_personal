-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2020 a las 04:43:49
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_personal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `telefono` int(9) NOT NULL,
  `operador` varchar(16) NOT NULL,
  `correo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_idioma`
--

CREATE TABLE `detalle_idioma` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `idioma` varchar(100) NOT NULL,
  `habla` varchar(50) NOT NULL,
  `lee` varchar(50) NOT NULL,
  `escribe` varchar(50) NOT NULL,
  `adquirido` varchar(50) NOT NULL,
  `graduado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_idioma`
--

INSERT INTO `detalle_idioma` (`id`, `personal_id`, `idioma`, `habla`, `lee`, `escribe`, `adquirido`, `graduado`) VALUES
(1, 14, '123123', 'R', 'R', 'R', 'PRACTICA', 'SI'),
(2, 14, '123', 'B', 'B', 'B', 'ESTUDIO', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id_men` int(11) NOT NULL,
  `nombre_men` varchar(45) DEFAULT NULL,
  `link_men` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id_men`, `nombre_men`, `link_men`) VALUES
(1, 'Inicio', 'dashboard'),
(2, 'Personal', 'control/personal'),
(3, 'Sanitario', 'control/sanitario_mensual'),
(4, 'Sanitario', 'control/sanitario_anual'),
(5, 'Sanitario Registro', 'control/sanitario_registro'),
(6, 'Vehiculos', 'control/vehiculos'),
(7, 'Reporte Cajas', 'reportes/cajas'),
(8, 'Ventas', 'movimientos/ventas'),
(9, 'Vender', 'movimientos/ventas/add'),
(10, 'Reporte Ventas', 'reportes/ventas'),
(11, 'Abastecimientos', 'movimientos/abastecimientos'),
(12, 'Abastecer', 'movimientos/abastecimientos/add'),
(13, 'Reporte Abastecimientos', 'reportes/abastecimientos'),
(14, 'Códigos', 'movimientos/codigos'),
(15, 'Tipos de Códigos', 'mantenimiento/tipos'),
(16, 'Usuarios', 'administrador/usuarios'),
(17, 'Permisos', 'administrador/permisos'),
(18, 'Descuentos', 'administrador/descuentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_per` int(11) NOT NULL,
  `read` int(11) DEFAULT NULL,
  `insert` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL,
  `id_men` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_per`, `read`, `insert`, `update`, `delete`, `id_men`, `id_rol`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 2, 1),
(29, 1, 1, 1, 1, 3, 1),
(30, 1, 1, 1, 1, 4, 1),
(31, 1, 1, 1, 1, 5, 1),
(32, 1, 1, 1, 1, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `imagen` varchar(64) NOT NULL,
  `grado` varchar(64) NOT NULL,
  `arma` varchar(32) NOT NULL,
  `apellido_pat` varchar(16) NOT NULL,
  `apellido_mat` varchar(16) NOT NULL,
  `nombres` varchar(32) NOT NULL,
  `estado_civ` varchar(16) NOT NULL,
  `anios_serv` int(4) NOT NULL,
  `grado_instruc` varchar(16) NOT NULL,
  `religion` varchar(32) NOT NULL,
  `fec_ultimo_asc` date NOT NULL,
  `depart_nac` varchar(16) NOT NULL,
  `provinc_nac` varchar(16) NOT NULL,
  `distrito_nac` varchar(16) NOT NULL,
  `fecha_nac` date NOT NULL,
  `edad` int(4) NOT NULL,
  `depart_viv` varchar(16) NOT NULL,
  `provinc_viv` varchar(16) NOT NULL,
  `distrito_viv` varchar(16) NOT NULL,
  `urbaniz_viv` varchar(32) NOT NULL,
  `calle_viv` varchar(16) NOT NULL,
  `cip` int(9) NOT NULL,
  `dni` int(9) NOT NULL,
  `pasaporte` varchar(9) NOT NULL,
  `brevete` varchar(16) NOT NULL,
  `talla_camisa` varchar(4) NOT NULL,
  `talla_pantalon` varchar(4) NOT NULL,
  `talla_calzado` varchar(4) NOT NULL,
  `talla_prenda` varchar(4) NOT NULL,
  `banco` varchar(16) NOT NULL,
  `nro_cuenta` int(16) NOT NULL,
  `afiliacion` varchar(16) NOT NULL,
  `estado` varchar(16) NOT NULL,
  `estado_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `imagen`, `grado`, `arma`, `apellido_pat`, `apellido_mat`, `nombres`, `estado_civ`, `anios_serv`, `grado_instruc`, `religion`, `fec_ultimo_asc`, `depart_nac`, `provinc_nac`, `distrito_nac`, `fecha_nac`, `edad`, `depart_viv`, `provinc_viv`, `distrito_viv`, `urbaniz_viv`, `calle_viv`, `cip`, `dni`, `pasaporte`, `brevete`, `talla_camisa`, `talla_pantalon`, `talla_calzado`, `talla_prenda`, `banco`, `nro_cuenta`, `afiliacion`, `estado`, `estado_registro`) VALUES
(16, 'pp.jpg', 'SUB OFICIAL DE TERCERA', 'CABALLERIA', 'Galvez', 'Galvez', 'Victor', 'DIVORCIADO', 123, 'SUPERIOR', '123', '1111-11-11', '2812', '2843', '2845', '0000-00-00', 123, '2645', '2645', '2646', '123', '123', 123, 123, '123', 'A-I', 'M', '30', '38', '55', '123', 123, 'AFP', '0', 0),
(17, 'pp.jpg', 'SUB OFICIAL DE TERCERA', 'CABALLERIA', 'galvez', 'chavez', 'victor', 'DIVORCIADO', 123, 'SUPERIOR', '123', '1111-11-11', '2534', '2563', '2565', '0000-00-00', 123, '2576', '2576', '2577', '123', '123', 115955050, 77127600, '123', 'A-I', 'M', '30', '38', '55', '123', 123, 'AFP', '0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_anual`
--

CREATE TABLE `registro_anual` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `personal_id` int(11) NOT NULL,
  `presion` varchar(16) NOT NULL,
  `medicina` varchar(64) NOT NULL,
  `edad` int(11) NOT NULL,
  `talla` double NOT NULL,
  `peso` double NOT NULL,
  `peri_abdominal` double NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_anual`
--

INSERT INTO `registro_anual` (`id`, `fecha`, `personal_id`, `presion`, `medicina`, `edad`, `talla`, `peso`, `peri_abdominal`, `estado`) VALUES
(1, '2020-03-08 18:11:10', 16, 'asd', 'asd', 123, 12123, 123, 123, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_sanitario`
--

CREATE TABLE `registro_sanitario` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `sexo` varchar(32) NOT NULL,
  `grupo_sang` varchar(64) NOT NULL,
  `alergias` varchar(124) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL,
  `descripcion_rol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `descripcion_rol`) VALUES
(1, 'superadmin', NULL),
(2, 'admin', NULL),
(3, 'cajero', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nombres_usu` varchar(100) DEFAULT NULL,
  `apellidos_usu` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `estado_usu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nombres_usu`, `apellidos_usu`, `telefono`, `email`, `username`, `password`, `id_rol`, `estado_usu`) VALUES
(1, 'Elvis', 'Apaza', '', '', 'turbo', '123', 1, 1),
(2, 'Zerito', 'Rosales', '983304363', 'zer0_su_tk@hotmail.com', 'zerito', 'fjdoi204', 3, 1),
(3, 'Deek', 'Calderon', NULL, NULL, 'deek', '123', 3, 1),
(4, 'Kato', NULL, NULL, NULL, 'kato', '123', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `n_placa` varchar(32) NOT NULL,
  `n_serie` varchar(32) NOT NULL,
  `n_vin` varchar(32) NOT NULL,
  `n_motor` varchar(32) NOT NULL,
  `n_color` varchar(16) NOT NULL,
  `marca` varchar(16) NOT NULL,
  `modelo` varchar(16) NOT NULL,
  `placa_vigente` varchar(32) NOT NULL,
  `placa_anterior` varchar(32) NOT NULL,
  `anotaciones` varchar(32) NOT NULL,
  `sede` varchar(32) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `n_placa`, `n_serie`, `n_vin`, `n_motor`, `n_color`, `marca`, `modelo`, `placa_vigente`, `placa_anterior`, `anotaciones`, `sede`, `personal_id`, `estado`) VALUES
(1, 'XS1232SRFEWR', 'XS1232SRFEWR', 'XS1232SRFEWR', 'XS1232SRFEWR', 'NEGRO', 'SUZUKI', 'AVPAS', 'ASDDAS', 'NINGUNA', 'ASDASD', 'ASDASD', 16, 1),
(2, 'asdasd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'as', 'as', 'asd', 17, 1),
(3, 'asdasd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'as', 'as', 'asd', 17, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_idioma`
--
ALTER TABLE `detalle_idioma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_id` (`personal_id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_men`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_per`),
  ADD KEY `fk_men_per` (`id_men`),
  ADD KEY `fk_rol_per` (`id_rol`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_anual`
--
ALTER TABLE `registro_anual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_id` (`personal_id`);

--
-- Indices de la tabla `registro_sanitario`
--
ALTER TABLE `registro_sanitario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_registro` (`personal_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `fk_role_usuarios` (`id_rol`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_id` (`personal_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_idioma`
--
ALTER TABLE `detalle_idioma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id_men` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `registro_anual`
--
ALTER TABLE `registro_anual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro_sanitario`
--
ALTER TABLE `registro_sanitario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_idioma`
--
ALTER TABLE `detalle_idioma`
  ADD CONSTRAINT `detalle_idioma_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_men_per` FOREIGN KEY (`id_men`) REFERENCES `menus` (`id_men`),
  ADD CONSTRAINT `fk_rol_per` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `registro_anual`
--
ALTER TABLE `registro_anual`
  ADD CONSTRAINT `registro_anual_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `registro_sanitario`
--
ALTER TABLE `registro_sanitario`
  ADD CONSTRAINT `fk_personal_registro` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_role_usuarios` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
