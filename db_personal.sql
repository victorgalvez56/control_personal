-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2020 a las 19:38:26
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

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
-- Estructura de tabla para la tabla `detalle_estudios`
--

CREATE TABLE `detalle_estudios` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `curso` varchar(32) COLLATE utf8_bin NOT NULL,
  `tipo_curso` varchar(32) COLLATE utf8_bin NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `detalle_estudios`
--

INSERT INTO `detalle_estudios` (`id`, `personal_id`, `curso`, `tipo_curso`, `estado`) VALUES
(1, 48, '1111', 'MILITAR', 1),
(2, 49, 'FJHGKHVKVKJVGJ', 'MILITAR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_familiar`
--

CREATE TABLE `detalle_familiar` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `nombre_fam` int(64) NOT NULL,
  `parentesco_fam` varchar(32) NOT NULL,
  `edad_fam` int(8) NOT NULL,
  `lugar_nac_fam` varchar(32) NOT NULL,
  `fecha_nac_fam` datetime NOT NULL,
  `cip_fam` int(8) NOT NULL,
  `dni_fam` int(9) NOT NULL,
  `telef_fam` int(9) NOT NULL,
  `grup_sang_fam` varchar(8) NOT NULL,
  `grad_inst_fam` varchar(32) NOT NULL
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
(3, 18, 'wfwf', 'B', 'B', 'M', 'ESTUDIO', 'NO'),
(4, 19, 'sdfsdf', 'M', 'B', 'R', 'ESTUDIO', 'SI'),
(5, 19, 'wedfw', 'R', 'R', 'B', 'ESTUDIO', 'SI'),
(6, 20, 'INGLES', 'R', 'M', 'B', 'ESTUDIO', 'NO'),
(7, 21, 'sdfsdf', 'R', 'R', 'M', 'ESTUDIO', 'NO'),
(8, 26, 'dwffgh', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(9, 27, 'asdasd', 'R', 'B', 'R', 'ESTUDIO', 'NO'),
(10, 28, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(11, 30, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(12, 31, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(13, 32, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(14, 33, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(15, 34, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(16, 35, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(17, 36, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(18, 37, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(19, 38, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(20, 39, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(21, 40, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(22, 47, '111', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(23, 48, '111', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(24, 49, 'asdasdas', 'B', 'B', 'B', 'ESTUDIO', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_seguro`
--

CREATE TABLE `detalle_seguro` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `seguro` varchar(32) COLLATE utf8_bin NOT NULL,
  `tipo_seguro` varchar(16) COLLATE utf8_bin NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `detalle_seguro`
--

INSERT INTO `detalle_seguro` (`id`, `personal_id`, `seguro`, `tipo_seguro`, `estado`) VALUES
(1, 48, '11111', 'MILITAR', 1),
(2, 49, 'GJHGVHVNJ', 'CIVIL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_viajes`
--

CREATE TABLE `detalle_viajes` (
  `id` int(11) NOT NULL,
  `lugar` varchar(32) COLLATE utf8_bin NOT NULL,
  `personal_id` int(11) NOT NULL,
  `motivo` varchar(64) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `detalle_viajes`
--

INSERT INTO `detalle_viajes` (`id`, `lugar`, `personal_id`, `motivo`, `fecha`, `estado`) VALUES
(1, 'cusco', 44, '1', '2019-01-04', 1),
(2, 'wdsd', 46, 'fsd', '1111-11-11', 1),
(3, 'sdas', 46, '1111', '2222-02-22', 1),
(4, '1111', 47, '1111', '1111-11-11', 1),
(5, '1111', 48, '1111', '1111-11-11', 1),
(6, 'WRWERWERW', 49, 'WEREWRWE', '2020-01-01', 1);

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
  `telefono` int(9) NOT NULL,
  `operador` varchar(32) NOT NULL,
  `correo` varchar(64) NOT NULL,
  `cip` int(9) NOT NULL,
  `dni` int(9) NOT NULL,
  `pasaporte` varchar(9) NOT NULL,
  `brevete` varchar(16) NOT NULL,
  `talla` double NOT NULL,
  `peso` double NOT NULL,
  `grupo_sang` varchar(16) NOT NULL,
  `sexo` varchar(16) NOT NULL,
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

INSERT INTO `personal` (`id`, `imagen`, `grado`, `arma`, `apellido_pat`, `apellido_mat`, `nombres`, `estado_civ`, `anios_serv`, `grado_instruc`, `religion`, `fec_ultimo_asc`, `depart_nac`, `provinc_nac`, `distrito_nac`, `fecha_nac`, `edad`, `depart_viv`, `provinc_viv`, `distrito_viv`, `urbaniz_viv`, `calle_viv`, `telefono`, `operador`, `correo`, `cip`, `dni`, `pasaporte`, `brevete`, `talla`, `peso`, `grupo_sang`, `sexo`, `talla_camisa`, `talla_pantalon`, `talla_calzado`, `talla_prenda`, `banco`, `nro_cuenta`, `afiliacion`, `estado`, `estado_registro`) VALUES
(18, '33cdr.jpg', 'SUB OFICIAL DE SEGUNDA', 'INTELIGENCIA', 'jkjbkj', 'kjn', 'kjn', 'DIVORCIADO', 123123, 'PRIMARIA', '1123', '1111-11-11', '2625', '2645', '2648', '0000-00-00', 0, '4188', '4188', '4191', 'dsfdsfsdf', 'sdcfdscdscsdc', 0, '', '', 123123, 123123, '1w3123', 'A-II-B', 0, 0, '', '', 'M', '32', '38', '55', '123123', 312312, 'AFP', '0', 1),
(19, '33cdr.jpg', 'SUB OFICIAL DE SEGUNDA', 'INTELIGENCIA', 'jkjbkj', 'kjn', 'kjn', 'DIVORCIADO', 123123, 'PRIMARIA', '1123', '1111-11-11', '3020', '3044', '3046', '0000-00-00', 0, '2823', '2823', '2828', 'dsfdsfsdf', 'sdcfdscdscsdc', 0, '', '', 123123, 123123, '1w3123', 'A-II-B', 0, 0, '', '', 'M', '32', '38', '55', '123123', 312312, 'AFP', '1', 1),
(20, '33cdr.jpg', 'SUB OFICIAL DE PRIMERA', 'INTELIGENCIA', 'GALVEZ', 'CHAVEZ', 'VICTOR', 'SOLTERO', 23, 'SUPERIOR', 'CATOLICA', '1111-11-11', '4236', '4295', '4301', '0000-00-00', 15, '2851', '2851', '2854', 'ADS', '15', 958560996, 'CLARO', 'VICTOR.GALVEZ56@GMAIL.COM', 115955050, 77127600, '123123', 'A-II-B', 0, 0, '', '', 'S', '32', '49', '59', 'BCP', 2147483647, 'AFP', '1', 0),
(21, '33cdr.jpg', 'TECNICO DE TERCERA', 'INTELIGENCIA', 'g', 'g', 'g', 'SOLTERO', 1, 'SECUNDARIA', 'catolico', '1111-11-11', '4309', '4326', '4332', '0000-00-00', 0, '4188', '4188', '4190', 'dadasd', 'sdasd', 958560996, 'asdasd', 'asads', 999999999, 99999999, '999999999', 'B-II-C', 1, 3, 'B-', 'MASCULINO', 'S', '30', '35', '52', 'sdfsdf', 23123, 'ONP', '1', 1),
(22, '20190726_155400.jpg', 'SUB OFICIAL DE PRIMERA', 'CABALLERIA', 'galvez', 'chavez', 'victor edison', 'SOLTERO', 23, 'TECNICO', 'cat', '2020-03-25', '4180', '4188', '4192', '0000-00-00', 0, '2851', '2851', '2854', 'aaaaa', 'aaaa', 958560996, 'asdasd', 'victor.galvez56@gmail.com', 115955050, 77127600, 'ghyvhguy', 'B-II-C', 1.6, 2.6, 'A-', 'MASCULINO', 'L', '32', '36', '55', 'bcp', 1231231231, 'AFP', '1', 1),
(23, 'pp.jpg', 'TECNICO DE TERCERA', 'INTELIGENCIA', '1', '1', 'VICTOR GALVEZ', 'DIVORCIADO', 1, 'PRIMARIA', '1', '1111-11-11', '2534', '2563', '2565', '0000-00-00', 1, '2535', '2535', '2539', '1', '1', 958560996, '111', '1111@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-II-B', 54.599, 55558.2, 'A+', 'MASCULINO', 'S', '30', '35', '52', '12', 123, 'AFP', '1', 1),
(24, 'pp.jpg', 'TECNICO DE TERCERA', 'INTELIGENCIA', '1', '1', 'VICTOR GALVEZ', 'DIVORCIADO', 1, 'PRIMARIA', '1', '1111-11-11', '2812', '2876', '2880', '0000-00-00', 1, '2645', '2645', '2646', '1', '1', 958560996, '111', '1111@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-II-B', 54.599, 55558.2, 'A+', 'MASCULINO', 'S', '30', '35', '52', '12', 123, 'AFP', '1', 0),
(25, 'pp.jpg', 'TECNICO DE TERCERA', 'INTELIGENCIA', '1', '1', 'VICTOR GALVEZ', 'DIVORCIADO', 1, 'PRIMARIA', '1', '1111-11-11', '2812', '2823', '2825', '0000-00-00', 1, '2645', '2645', '2649', '1', '1', 958560996, '111', '1111@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-II-B', 54.599, 55558.2, 'A+', 'MASCULINO', 'S', '30', '35', '52', '12', 123, 'AFP', '1', 1),
(26, 'Imagen1.png', 'SUB OFICIAL DE TERCERA', 'ARTILLERIA', 'd', 'd', 'NOMBRE...', 'SOLTERO', 7, 'PRIMARIA', 'dsfdsf', '2020-12-31', '2534', '2557', '2559', '0000-00-00', 0, '2557', '2557', '2559', 's', 'ws', 958560996, 'bitl', 'aseis.@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-I', 150, 39, 'A+', 'MASCULINO', 'S', '30', '35', '52', 'dfd', 2147483647, 'AFP', '1', 0),
(27, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', 'NOMBRE...', 'DIVORCIADO', 1, 'PRIMARIA', '1', '1111-11-11', '2534', '2557', '2559', '0000-00-00', 1, '4219', '4219', '4223', '1', '1', 958560996, '1', '1@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-I', 11111.666, 1.777, 'A+', 'MASCULINO', 'S', '30', '35', '52', 'sdfsdfsdf', 1231312, 'AFP', '1', 1),
(28, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '123', '1', 'NOMBRE...', 'SOLTERO', 1, 'PRIMARIA', 'dsfdsf', '1111-11-11', '2534', '2557', '2559', '0000-00-00', 11, '2557', '2557', '2559', 'dsfdsfsdf', '11', 958560996, '1', '1@prescott.edu.pe', 115955050, 77127600, 'ASDASD111', 'A-I', 11, 111, 'A-', 'MASCULINO', 'S', '30', '35', '52', 'a', 1, 'ONP', '1', 0),
(29, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '123', '1', 'NOMBRE...', 'SOLTERO', 1, 'PRIMARIA', 'dsfdsf', '1111-11-11', '4108', '4123', '4125', '0000-00-00', 11, '2901', '2901', '2903', 'dsfdsfsdf', '11', 958560996, '1', '1@prescott.edu.pe', 115955050, 77127600, 'ASDASD111', 'A-I', 11, 111, 'A-', 'MASCULINO', 'S', '30', '35', '52', 'a', 1, 'ONP', '1', 0),
(30, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '123', '1', 'NOMBRE...', 'SOLTERO', 1, 'PRIMARIA', 'dsfdsf', '1111-11-11', '4236', '4247', '4248', '0000-00-00', 11, '4219', '4219', '4221', 'dsfdsfsdf', '11', 958560996, '1', '1@prescott.edu.pe', 115955050, 77127600, 'ASDASD111', 'A-I', 11, 111, 'A-', 'MASCULINO', 'S', '30', '35', '52', 'a', 1, 'ONP', '1', 0),
(31, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', '1', 'SOLTERO', 1, 'SUPERIOR', '1', '1111-11-11', '4236', '4247', '4248', '0000-00-00', 11, '2557', '2557', '2559', '11', '11', 1, '1', '1@gmail.com', 111, 111, '111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(32, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', '1', 'SOLTERO', 1, 'SUPERIOR', '1', '1111-11-11', '4236', '4247', '4248', '0000-00-00', 11, '2557', '2557', '2559', '11', '11', 1, '1', '1@gmail.com', 111, 111, '111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(33, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', '1', 'SOLTERO', 1, 'SUPERIOR', '1', '1111-11-11', '4236', '4247', '4248', '0000-00-00', 11, '2557', '2557', '2559', '11', '11', 1, '1', '1@gmail.com', 111, 111, '111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(34, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', '1', 'SOLTERO', 1, 'SUPERIOR', '1', '1111-11-11', '4236', '4247', '4248', '0000-00-00', 11, '2557', '2557', '2559', '11', '11', 1, '1', '1@gmail.com', 111, 111, '111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(35, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', '1', 'SOLTERO', 1, 'SUPERIOR', '1', '1111-11-11', '4236', '4247', '4248', '0000-00-00', 11, '2557', '2557', '2559', '11', '11', 1, '1', '1@gmail.com', 111, 111, '111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(36, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', '1', 'SOLTERO', 1, 'SUPERIOR', '1', '1111-11-11', '4236', '4247', '4248', '0000-00-00', 11, '2557', '2557', '2559', '11', '11', 1, '1', '1@gmail.com', 111, 111, '111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(37, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', '1', 'SOLTERO', 1, 'SUPERIOR', '1', '1111-11-11', '4236', '4247', '4248', '0000-00-00', 11, '2557', '2557', '2559', '11', '11', 1, '1', '1@gmail.com', 111, 111, '111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(38, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', '1', 'SOLTERO', 1, 'SUPERIOR', '1', '1111-11-11', '4236', '4247', '4248', '0000-00-00', 11, '2557', '2557', '2559', '11', '11', 1, '1', '1@gmail.com', 111, 111, '111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(39, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', '1', 'SOLTERO', 1, 'SUPERIOR', '1', '1111-11-11', '4236', '4247', '4248', '0000-00-00', 11, '2557', '2557', '2559', '11', '11', 1, '1', '1@gmail.com', 111, 111, '111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(40, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', '1', 'SOLTERO', 1, 'SUPERIOR', '1', '1111-11-11', '4236', '4247', '4248', '0000-00-00', 11, '2557', '2557', '2559', '11', '11', 1, '1', '1@gmail.com', 111, 111, '111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(41, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', 'NOMBRE...', 'SOLTERO', 1, 'PRIMARIA', '1', '1111-11-11', '2625', '2639', '2640', '0000-00-00', 11, '2557', '2557', '2559', '11', '11', 958560996, '1', '1@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(42, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', 'NOMBRE...', 'SOLTERO', 1, 'PRIMARIA', '1', '1111-11-11', '2625', '2655', '2660', '0000-00-00', 11, '2655', '2655', '2659', '11', '11', 958560996, '1', '1@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(43, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', 'NOMBRE...', 'SOLTERO', 1, 'PRIMARIA', '1', '1111-11-11', '2625', '2655', '2660', '0000-00-00', 11, '2655', '2655', '2659', '11', '11', 958560996, '1', '1@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(44, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', 'NOMBRE...', 'SOLTERO', 1, 'PRIMARIA', '1', '1111-11-11', '2625', '2655', '2660', '0000-00-00', 11, '2655', '2655', '2659', '11', '11', 958560996, '1', '1@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(45, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', 'NOMBRE...', 'SOLTERO', 1, 'PRIMARIA', '1', '1111-11-11', '4180', '4200', '4202', '0000-00-00', 11, '2645', '2645', '2649', '11', '11', 958560996, '1', '1@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(46, 'Imagen1.png', 'GRAL DIV EP', 'ARTILLERIA', '1', '1', 'NOMBRE...', 'SOLTERO', 1, 'PRIMARIA', '1', '1111-11-11', '4180', '4200', '4202', '0000-00-00', 11, '2645', '2645', '2649', '11', '11', 958560996, '1', '1@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-I', 111, 11, 'A+', 'MASCULINO', 'S', '30', '35', '52', '111', 111, 'AFP', '1', 0),
(47, 'Imagen1.png', 'TTE CRL EP', 'ARTILLERIA', '1', '1', 'NOMBRE...', 'SOLTERO', 1, 'PRIMARIA', '1', '1111-11-11', '2625', '2639', '2640', '0000-00-00', 111, '2557', '2557', '2559', '11', '111', 958560996, '111', '111@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-I', 111, 111, 'A+', 'MASCULINO', 'S', '30', '35', '52', '1', 1, 'AFP', '1', 0),
(48, 'Imagen1.png', 'TTE CRL EP', 'ARTILLERIA', '1', '1', 'NOMBRE...', 'SOLTERO', 1, 'PRIMARIA', '1', '1111-11-11', '2625', '2639', '2640', '0000-00-00', 111, '2557', '2557', '2559', '11', '111', 958560996, '111', '111@gmail.com', 115955050, 77127600, 'ASDASD111', 'A-I', 111, 111, 'A+', 'MASCULINO', 'S', '30', '35', '52', '1', 1, 'AFP', '1', 0),
(49, 'Imagen1.png', 'TTE CRL EP', 'COMUNICACIONES', 'MARQUEZ ', 'ALAYO', 'NOMBRE...', 'CASADO', 21, 'PRIMARIA', 'CATOLICO', '2016-01-01', '3788', '3789', '3794', '0000-00-00', 0, '2901', '2901', '2910', 'URB SANTA RIRA DE CASIA', 'C-53', 958560996, 'MOVISTAR', 'PMARQUEZA@EJERCITO.MIL.PE', 115955050, 77127600, 'ASDASD111', 'A-I', 1.7, 83, 'O+', 'MASCULINO', 'M', '32', '41', '57', 'BANCO DE LA NACI', 2147483647, 'AFP', '1', 0);

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
(2, '2020-03-26 00:00:00', 19, '111', '111', 111, 111, 111, 1, 1),
(3, '2020-03-14 11:29:29', 18, '123', 'NO', 1111, 111, 111, 111, 1),
(4, '2020-03-14 11:32:54', 18, 'NO', 'NO', 123, 1.23, 123, 123, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_mensual`
--

CREATE TABLE `registro_mensual` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `personal_id` int(11) NOT NULL,
  `presion_sis` varchar(16) NOT NULL,
  `presion_dias` varchar(16) NOT NULL,
  `pulso` varchar(8) NOT NULL,
  `valoracion` varchar(128) NOT NULL,
  `grado_atenc` varchar(16) NOT NULL,
  `apellid_atenc` varchar(16) NOT NULL,
  `peso` varchar(8) NOT NULL,
  `imc` varchar(8) NOT NULL,
  `tabla_imc` varchar(32) NOT NULL,
  `peri_abdominal` double NOT NULL,
  `tabla_periab` varchar(32) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_mensual`
--

INSERT INTO `registro_mensual` (`id`, `fecha`, `personal_id`, `presion_sis`, `presion_dias`, `pulso`, `valoracion`, `grado_atenc`, `apellid_atenc`, `peso`, `imc`, `tabla_imc`, `peri_abdominal`, `tabla_periab`, `estado`) VALUES
(3, '2020-03-05 00:00:00', 19, '123', '123', '123', '123', '123', '123', '123', '123', '123', 123, '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_sanitario`
--

CREATE TABLE `registro_sanitario` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `sexo` varchar(32) NOT NULL,
  `grupo_sang` varchar(32) NOT NULL,
  `alergias` varchar(124) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_sanitario`
--

INSERT INTO `registro_sanitario` (`id`, `personal_id`, `fecha`, `sexo`, `grupo_sang`, `alergias`, `estado`) VALUES
(24, 22, '2020-03-10 20:04:31', 'MASCULINO', 'SUPERIOR', 'NO', 1),
(25, 21, '2020-03-10 20:12:54', 'FEMENINO', 'SECUNDARIA', 'NO', 1),
(26, 25, '2020-03-10 20:28:10', 'MASCULINO', 'A+', '11', 1),
(27, 25, '2020-03-10 20:28:24', 'MASCULINO', 'A+', '1', 1),
(28, 27, '2020-03-10 20:28:40', 'MASCULINO', 'A+', 'pepe', 1),
(29, 25, '2020-03-10 20:29:25', 'MASCULINO', 'A+', 'kkkk', 1),
(30, 21, '2020-03-10 20:37:56', 'MASCULINO', 'B-', 'vv', 1),
(31, 23, '2020-03-11 09:59:19', 'MASCULINO', 'A+', 'aDNAdnD', 1),
(32, 18, '2020-03-14 11:22:38', '', '', 'asd', 1),
(33, 21, '2020-03-14 13:33:55', 'MASCULINO', 'B-', '123123', 1),
(34, 19, '2020-03-14 13:34:11', '', '', 'DDDDD', 1);

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
(1, 'Elvis Bustamante', 'Apaza', '', '', 'turbo', '123', 1, 1),
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
(4, 'knln', 'k', 'n', 'n', 'nj', 'j ', 'j ', ' jhbk', ' k', 'kj ', 'ml', 23, 1),
(5, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 22, 1),
(6, 'e', '3', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 24, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_estudios`
--
ALTER TABLE `detalle_estudios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_estudios` (`personal_id`);

--
-- Indices de la tabla `detalle_familiar`
--
ALTER TABLE `detalle_familiar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_famliar_detalle` (`personal_id`);

--
-- Indices de la tabla `detalle_idioma`
--
ALTER TABLE `detalle_idioma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_id` (`personal_id`);

--
-- Indices de la tabla `detalle_seguro`
--
ALTER TABLE `detalle_seguro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_seguros` (`personal_id`);

--
-- Indices de la tabla `detalle_viajes`
--
ALTER TABLE `detalle_viajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_viajes` (`personal_id`);

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
-- Indices de la tabla `registro_mensual`
--
ALTER TABLE `registro_mensual`
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
-- AUTO_INCREMENT de la tabla `detalle_estudios`
--
ALTER TABLE `detalle_estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_familiar`
--
ALTER TABLE `detalle_familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_idioma`
--
ALTER TABLE `detalle_idioma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `detalle_seguro`
--
ALTER TABLE `detalle_seguro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_viajes`
--
ALTER TABLE `detalle_viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `registro_anual`
--
ALTER TABLE `registro_anual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registro_mensual`
--
ALTER TABLE `registro_mensual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registro_sanitario`
--
ALTER TABLE `registro_sanitario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_estudios`
--
ALTER TABLE `detalle_estudios`
  ADD CONSTRAINT `fk_detalle_estudios` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `detalle_familiar`
--
ALTER TABLE `detalle_familiar`
  ADD CONSTRAINT `fk_famliar_detalle` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `detalle_idioma`
--
ALTER TABLE `detalle_idioma`
  ADD CONSTRAINT `detalle_idioma_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `detalle_seguro`
--
ALTER TABLE `detalle_seguro`
  ADD CONSTRAINT `fk_detalle_seguros` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `detalle_viajes`
--
ALTER TABLE `detalle_viajes`
  ADD CONSTRAINT `fk_detalle_viajes` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`);

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
  ADD CONSTRAINT `registro_anual_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`),
  ADD CONSTRAINT `registro_mensual_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `registro_mensual`
--
ALTER TABLE `registro_mensual`
  ADD CONSTRAINT `fk_mensual_registro` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`);

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
