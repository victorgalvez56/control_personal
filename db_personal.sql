-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2020 a las 05:34:54
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
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `registro` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `registro`, `usuario_id`) VALUES
(1, '2020-02-12 23:07:22', 3);

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
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, 'Amazonas'),
(2, 'Ancash');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `provincia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, 'Proveedores', 'mantenimiento/proveedores'),
(4, 'Productos', 'mantenimiento/productos'),
(5, 'Cajas', 'movimientos/cajas'),
(6, 'Registrar Cajas', 'movimientos/cajas/add'),
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
(2, 1, 1, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
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
  `talla_prenda` int(11) NOT NULL,
  `talla` double NOT NULL,
  `peso` double NOT NULL,
  `grupo_sang` varchar(8) NOT NULL,
  `sexo` varchar(8) NOT NULL,
  `banco` varchar(16) NOT NULL,
  `nro_cuenta` int(16) NOT NULL,
  `afp` varchar(16) NOT NULL,
  `onp` varchar(16) NOT NULL,
  `estado` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `ciudad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `nombre`, `ciudad_id`) VALUES
(1, 'Chachapoyas', 1),
(2, 'Bagua', 1),
(3, 'Bongara', 1),
(4, 'Condorcanqui', 1),
(5, 'Luya', 1),
(6, 'Rodríguez de Mendoza', 1),
(7, 'Luya', 1),
(8, 'Utcubamba', 1),
(9, 'Huaraz', 2),
(10, 'Aija', 2),
(11, 'Antonio Raimondi', 2),
(12, 'Asunción', 2),
(13, 'Bolognesi', 2),
(14, 'Carhuaz', 2),
(15, 'Carlos Fermín Fitzcarrald', 2),
(16, 'Casma', 2),
(17, 'Corongo', 2),
(18, 'Huari', 2),
(19, 'Huarmey', 2),
(20, 'Huaylas', 2),
(21, 'Mariscal Luzuriaga', 2),
(22, 'Ocros', 2),
(23, 'Pallasca', 2),
(24, 'Pomabamba', 2),
(25, 'Recuay', 2),
(26, 'Santa', 2),
(27, 'Sihuas', 2),
(28, 'Yungay', 2);

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD KEY `provincia_id` (`provincia_id`);

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
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_provincia_ciud` (`ciudad_id`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
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
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `distrito_ibfk_1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_men_per` FOREIGN KEY (`id_men`) REFERENCES `menus` (`id_men`),
  ADD CONSTRAINT `fk_rol_per` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `fk_provincia_ciud` FOREIGN KEY (`ciudad_id`) REFERENCES `departamento` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_role_usuarios` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
