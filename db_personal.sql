-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-06-2020 a las 23:59:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(9, 83, '1', 'MILITAR', 1),
(10, 84, 'COCINA', 'EXTRACASTRENCE', 1),
(11, 84, 'PILOTAJE', 'MILITAR', 1),
(12, 85, 'ASAS', 'EXTRACASTRENCE', 1),
(13, 88, 'AXD', 'MILITAR', 1),
(14, 89, 'ASD', 'MILITAR', 1),
(15, 90, '1', 'MILITAR', 1),
(16, 91, '1', 'MILITAR', 1),
(17, 113, 'AAAA', 'EXTRACASTRENCE', 1),
(18, 113, 'BBB', 'MILITAR', 1),
(19, 114, 'AAAA', 'EXTRACASTRENCE', 1),
(20, 114, 'BBB', 'MILITAR', 1),
(21, 115, 'PS', 'MILITAR', 1),
(22, 116, 'APRENDO EN CASA', 'EXTRACASTRENCE', 1),
(23, 117, 'APRENDO EN CASA', 'EXTRACASTRENCE', 1),
(24, 118, 'APRENDO EN CASA', 'EXTRACASTRENCE', 1);

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
  `fecha_nac_fam` date NOT NULL,
  `cip_fam` int(8) NOT NULL,
  `dni_fam` int(9) NOT NULL,
  `telef_fam` int(9) NOT NULL,
  `grup_sang_fam` varchar(8) NOT NULL,
  `grad_inst_fam` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_familiar`
--

INSERT INTO `detalle_familiar` (`id`, `personal_id`, `nombre_fam`, `parentesco_fam`, `edad_fam`, `lugar_nac_fam`, `fecha_nac_fam`, `cip_fam`, `dni_fam`, `telef_fam`, `grup_sang_fam`, `grad_inst_fam`) VALUES
(9, 83, 1, '1', 1, '1', '2020-12-31', 1, 1, 1, 'A+', 'PRIMARIA'),
(10, 84, 0, 'ASDAS', 12312, '123123', '2020-12-14', 1233412, 321231, 1231212, 'A-', 'SECUNDARIA'),
(11, 85, 0, 'CONYUGE', 123, 'Madre', '1997-12-01', 1111, 123, 111, 'A+', 'PRIMARIA'),
(12, 88, 0, 'PADRE', 1, 'Amazonas', '2020-12-14', 1, 1, 1, 'A+', 'PRIMARIA'),
(13, 89, 0, 'CONYUGE', 123, 'Ancash', '1997-01-14', 1, 1, 123, 'B+', 'TECNICO'),
(14, 90, 1, 'HIJO', 1, 'Apurimac', '0001-01-01', 1, 1, 1, 'B-', 'SUPERIOR'),
(15, 91, 1, 'CONYUGE', 1, 'Apurimac', '1997-01-01', 1, 1, 1, 'B+', 'SECUNDARIA'),
(16, 99, 0, 'PADRE', 18, 'Amazonas', '1997-12-01', 123, 123, 123, 'A-', 'SUPERIOR'),
(17, 109, 0, 'MADRE', 123, '2', '1997-01-14', 123, 123, 123, 'A+', 'TECNICO'),
(18, 111, 0, 'PADRE', 58, 'La', '1987-01-25', 115955000, 77127600, 958560996, 'A+', 'PRIMARIA'),
(19, 112, 0, 'PADRE', 18, 'Amazonas', '1997-01-14', 115955050, 77127600, 2147483647, 'A+', 'PRIMARIA'),
(20, 113, 0, 'PADRE', 18, 'Amazonas', '1997-01-14', 1155595050, 552, 59292, 'A+', 'PRIMARIA'),
(21, 113, 0, 'PADRE', 123, 'San', '1997-01-14', 123123, 123123, 123123, 'O+', 'PRIMARIA'),
(22, 114, 0, 'PADRE', 18, 'Amazonas', '1997-01-14', 1155595050, 552, 59292, 'A+', 'PRIMARIA'),
(23, 114, 0, 'PADRE', 123, 'San', '1997-01-14', 123123, 123123, 123123, 'O+', 'PRIMARIA'),
(24, 115, 0, 'PADRE', 18, 'Ayacucho', '1997-01-14', 115955050, 77127600, 958560996, 'A+', 'PRIMARIA'),
(25, 116, 0, 'PADRE', 18, 'Piura', '2001-05-04', 115955051, 18181818, 958560996, 'A+', 'PRIMARIA'),
(26, 117, 0, 'PADRE', 18, 'Piura', '2001-05-04', 115955051, 18181818, 958560996, 'A+', 'PRIMARIA'),
(27, 118, 0, 'PADRE', 18, 'Piura', '2001-05-04', 115955051, 18181818, 958560996, 'A+', 'PRIMARIA');

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
(40, 83, '1', 'B', 'B', 'B', 'PRACTICA', 'SI'),
(41, 84, 'ASD', 'R', 'B', 'B', 'ESTUDIO', 'SI'),
(42, 84, 'ASD', 'B', 'R', 'M', '', 'NO'),
(43, 84, 'ASD', 'B', 'B', 'B', 'ESTUDIO', ''),
(44, 84, 'ASD', 'M', 'R', 'R', 'ESTUDIO', 'SI'),
(45, 85, '123', 'R', 'B', 'B', 'PRACTICA', 'SI'),
(46, 86, 'asd', 'R', 'B', 'R', 'PRACTICA', 'NO'),
(47, 88, '123', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(48, 89, 'asd', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(49, 90, 'asd', 'M', 'B', 'B', 'ESTUDIO', 'SI'),
(50, 91, '1', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(51, 99, 'ingles', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(52, 113, 'GA', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(53, 113, 'GT', 'B', 'B', 'R', 'ESTUDIO', 'SI'),
(54, 114, 'GA', 'GA', 'B', 'B', 'ESTUDIO', 'SI'),
(55, 114, 'GT', 'GT', 'B', 'R', 'ESTUDIO', 'SI'),
(56, 115, 'INGLES', 'R', 'B', 'M', 'ESTUDIO', 'SI'),
(57, 116, 'INGLES', 'B', 'B', 'B', 'ESTUDIO', 'SI'),
(58, 117, 'INGLES', 'INGLES', 'B', 'B', 'ESTUDIO', 'SI'),
(59, 118, 'INGLES', 'INGLES', 'B', 'B', 'ESTUDIO', 'SI');

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
(9, 83, '1', 'MILITAR', 1),
(10, 84, '123123', 'MILITAR', 1),
(11, 85, 'ASD', 'MILITAR', 1),
(12, 88, '1', 'MILITAR', 1),
(13, 89, 'AD', 'MILITAR', 1),
(14, 90, 'ASD', 'CIVIL', 1),
(15, 91, 'ASD', 'MILITAR', 1),
(16, 113, 'AG', 'MILITAR', 1),
(17, 113, 'GA', 'CIVIL', 1),
(18, 114, 'AG', 'MILITAR', 1),
(19, 114, 'GA', 'CIVIL', 1),
(20, 115, 'SOCIAL', 'MILITAR', 1),
(21, 116, 'XXXXXXXXXX', 'MILITAR', 1),
(22, 117, 'ONCOSALUD', 'MILITAR', 1),
(23, 118, 'ONCOSALUD', 'MILITAR', 1),
(24, 116, 'ZZZZZZZZZZZ', 'MILITAR', 1);

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
(14, '1', 83, '1', '2020-12-31', 1),
(15, 'MEIXO', 84, 'VACACIONES', '2020-12-31', 1),
(16, 'asd', 85, 'asd', '1997-01-14', 1),
(17, '123', 88, '3212', '2020-12-31', 1),
(18, '123', 89, '123', '1997-01-14', 1),
(19, 'asd', 90, 'asd', '1997-01-01', 1),
(20, 'asd', 91, 'asd', '1997-01-14', 1),
(21, 'GA', 113, 'GA', '1997-01-14', 1),
(22, 'AG', 113, 'AG', '1997-01-14', 1),
(23, 'GA', 114, 'GA', '1997-01-14', 1),
(24, 'AG', 114, 'AG', '1997-01-14', 1),
(25, 'BRASIL', 115, 'TURISMO', '1997-01-14', 1),
(26, 'BRASIL', 116, 'TURISMO', '2020-12-04', 1),
(27, 'BRASIL', 117, 'TURISMO', '2020-12-04', 1),
(28, 'BRASIL', 118, 'TURISMO', '2020-12-04', 1);

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
(2, 'Personal Militar', 'control/personal_militar'),
(3, 'Personal Civil', 'control/personal_civil'),
(4, 'Sanitario Registro', 'control/sanitario_registro'),
(5, 'Sanitario Mensual', 'control/sanitario_mensual'),
(6, 'Sanitario Anual', 'control/sanitario_anual'),
(7, 'Vehiculos', 'control/vehiculos'),
(8, 'Tarjeta Identidad', 'control/tarjeta_identidad'),
(9, 'Tarjeta Valoración Sanitaria', 'control/tarjeta_valoracion'),
(10, 'Usuarios', 'administrador/usuarios'),
(11, 'Permisos', 'administrador/permisos'),
(12, 'Tarjeta de Salud', 'salud/tarjeta_salud'),
(13, 'Reportes', 'administrador/reportes');

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
(3, 1, 1, 1, 1, 3, 1),
(4, 1, 1, 1, 1, 4, 1),
(5, 1, 1, 1, 1, 5, 1),
(6, 1, 1, 1, 1, 6, 1),
(7, 1, 1, 1, 1, 7, 1),
(8, 1, 1, 1, 1, 8, 1),
(9, 1, 1, 1, 1, 9, 1),
(10, 1, 1, 1, 1, 10, 1),
(11, 1, 1, 1, 1, 11, 1),
(12, 1, 1, 1, 1, 12, 8),
(14, 0, 0, 0, 0, 1, 8),
(15, 1, 1, 1, 1, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `imagen` varchar(64) NOT NULL,
  `grado` varchar(64) NOT NULL,
  `arma` varchar(32) NOT NULL,
  `apellido_pat` varchar(64) NOT NULL,
  `apellido_mat` varchar(64) NOT NULL,
  `nombres` varchar(64) NOT NULL,
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
  `banco` varchar(50) NOT NULL,
  `nro_cuenta` int(16) NOT NULL,
  `afiliacion` varchar(16) NOT NULL,
  `tipo_personal` varchar(20) NOT NULL,
  `area_trabajo` varchar(45) NOT NULL,
  `unidad` varchar(45) NOT NULL,
  `tiempo_puesto` int(11) NOT NULL,
  `estado` varchar(16) NOT NULL,
  `estado_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `imagen`, `grado`, `arma`, `apellido_pat`, `apellido_mat`, `nombres`, `estado_civ`, `anios_serv`, `grado_instruc`, `religion`, `fec_ultimo_asc`, `depart_nac`, `provinc_nac`, `distrito_nac`, `fecha_nac`, `edad`, `depart_viv`, `provinc_viv`, `distrito_viv`, `urbaniz_viv`, `calle_viv`, `telefono`, `operador`, `correo`, `cip`, `dni`, `pasaporte`, `brevete`, `talla`, `peso`, `grupo_sang`, `sexo`, `talla_camisa`, `talla_pantalon`, `talla_calzado`, `talla_prenda`, `banco`, `nro_cuenta`, `afiliacion`, `tipo_personal`, `area_trabajo`, `unidad`, `tiempo_puesto`, `estado`, `estado_registro`) VALUES
(111, 'nombre_archivo37.jpg', 'GRAL DIV EP', 'COMUNICACIONES', 'XXXXXX', 'XXXXX', 'XXXX', 'SOLTERO', 23, 'SUPERIOR', 'MORMONISMO', '2020-02-15', '', '', '', '1997-01-14', 0, 'APURIMAC', 'AYMARAES', 'COTARUSE', 'XXXX', 'XXXXX', 0, 'ENTEL', 'X@GMAIL.COM', 115955050, 77127600, 'NO', 'NO TIENE', 1.82, 74, 'A+', 'MASCULINO', 'L', '30', '35', '52', 'BANCO DE CREDITO DEL PERU', 2147483647, 'AFP', 'MILITAR', '', '', 0, '0', 1),
(112, 'nombre_archivo38.jpg', 'MY EP', 'ADMINISTRACION PERSONAL', 'GAMES', 'GORDON', 'GOLIAT', 'CASADO', 1, 'PRIMARIA', 'CATOLICA', '1997-01-14', 'ANCASH', 'ASUNCION', 'CHACAS', '1997-01-14', 0, 'PASCO', 'OXAPAMPA', 'OXAPAMPA', 'GA', 'GA', 123, 'ENTEL', 'GA@GMAIL.COM', 115955050, 77127600, 'XXXX', 'NO TIENE', 1.82, 72.5, 'A+', 'MASCULINO', 'S', '30', '35', '52', 'BANCO DE CREDITO DEL PERU', 2147483647, 'AFP', 'MILITAR', '', '', 0, '1', 1),
(113, 'nombre_archivo39.jpg', 'GRAL BRIG EP', 'INTELIGENCIA', '123', '123', '123', 'CASADO', 123, 'PRIMARIA', 'NO TIENE', '1111-11-11', '', '', '', '1997-01-14', 0, '', '', '', '123', '123', 123, 'BITEL', '123@GMAIL.COM', 123, 123, '123', 'A-I', 123, 123, 'B-', 'FEMENINO', 'M', '32', '48', '54', 'BANCO DEL COMERCIO', 123, 'ONP', 'MILITAR', '', '', 0, '1', 1),
(114, 'nombre_archivo40.jpg', 'GRAL BRIG EP', 'INTELIGENCIA', '123', '123', '123', 'CASADO', 123, 'PRIMARIA', 'NO TIENE', '1111-11-11', '', '', '', '1997-01-14', 0, '', '', '', '123', '123', 123, 'BITEL', '123@GMAIL.COM', 123, 123, '123', 'A-I', 123, 123, 'B-', 'FEMENINO', 'M', '32', '48', '54', 'BANCO DEL COMERCIO', 123, 'ONP', 'MILITAR', '', '', 0, '1', 1),
(115, 'nombre_archivo3.png', 'GRAL DIV EP', 'ARTILLERIA', 'GALVEZ', 'CHAVEZ', 'VICTOR', 'SOLTERO', 23, 'PRIMARIA', 'NO TIENE', '1997-12-01', 'LORETO', 'LORETO', 'TROMPETEROS', '1997-01-14', 0, 'APURIMAC', 'ABANCAY', 'ABANCAY', '123', '123', 123, 'BITEL', '123@GMAIL.COM', 115955050, 77127600, 'NO', 'NO TIENE', 1.82, 72.5, 'A+', 'MASCULINO', 'M', '30', '35', '52', 'BANCO DE CREDITO DEL PERU', 2147483647, 'AFP', 'MILITAR', '', '', 0, '0', 1),
(116, 'nombre_archivo', 'GRAL DIV EP', 'CABALLERIA', 'GALVEZ', 'CHAVEZ', 'VICTOR EDISON', 'SOLTERO', 0, 'SUPERIOR', 'NO TIENE', '2020-02-20', '', '', '', '1997-01-14', 0, 'AREQUIPA', 'CAMANA', 'MARIANO NICOLAS ', 'MIRAFLORES', 'VILLA', 958560996, 'ENTEL', 'VICTOR.GALVEZ56@GMAIL.COM', 115955050, 77127600, 'NO', 'NO TIENE', 1.82, 72.5, 'A+', 'MASCULINO', 'L', '34', '41', '59', 'BANCO DE CREDITO DEL PERU', 2147483647, 'AFP', 'MILITAR', '', '', 0, '1', 1),
(117, 'nombre_archivo5.png', 'GRAL DIV EP', 'CABALLERIA', 'GALVEZ', 'CHAVEZ', 'VICTOR EDISON', 'SOLTERO', 0, 'SUPERIOR', 'NO TIENE', '2020-02-20', '', '', '', '1997-01-14', 0, '', '', '', 'MIRAFLORES', 'VILLA', 958560996, 'ENTEL', 'VICTOR.GALVEZ56@GMAIL.COM', 115955050, 77127600, 'NO', 'NO TIENE', 1.82, 72.5, 'A+', 'MASCULINO', 'L', '34', '41', '59', 'BANCO DE CREDITO DEL PERU', 2147483647, 'AFP', 'MILITAR', '', '', 0, '0', 1),
(118, 'nombre_archivo41.jpg', 'GRAL DIV EP', 'CABALLERIA', 'GALVEZ', 'CHAVEZ', 'VICTOR EDISON', 'SOLTERO', 0, 'SUPERIOR', 'NO TIENE', '2020-02-20', '', '', '', '1997-01-14', 0, 'APURIMAC', 'CHINCHEROS', 'OCOBAMBA', 'MIRAFLORES', 'VILLA', 958560996, 'ENTEL', 'VICTOR.GALVEZ56@GMAIL.COM', 115955050, 77127600, 'NO', 'NO TIENE', 1.82, 72.5, 'A+', 'MASCULINO', 'L', '34', '41', '59', 'BANCO DE CREDITO DEL PERU', 2147483647, 'AFP', 'MILITAR', '', '', 0, '0', 1);

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
(8, '2020-04-28 21:47:46', 111, 'GAAAA', 'GAAA', 23, 1.2, 2.2, 2.3, 1),
(9, '2020-04-28 21:49:34', 82, 'faaa', 'faaa', 23, 123, 123, 123, 1),
(10, '2020-04-28 22:50:28', 111, 'NO', 'NO', 23, 1.82, 72.9, 89, 1),
(11, '2020-05-02 01:52:26', 82, '123', '123', 23, 1.26, 5.6, 2.6, 0),
(12, '2020-05-02 02:16:49', 82, 'gaa', 'gaaaa', 23, 1.2, 2.2, 2.3, 0),
(13, '2020-05-02 02:17:53', 82, 'sss', 'ssss', 23, 123, 123, 123, 0),
(14, '2020-05-02 23:35:44', 82, 'NO', 'ANALGESICOS', 18, 10.5, 80.5, 50, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_mensual`
--

CREATE TABLE `registro_mensual` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `personal_id` int(11) NOT NULL,
  `pres_sis` int(11) NOT NULL,
  `pres_dia` int(11) NOT NULL,
  `pulso` int(11) NOT NULL,
  `valoracion` varchar(50) NOT NULL,
  `medico` varchar(50) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `perimetro` varchar(50) NOT NULL,
  `imc` varchar(50) NOT NULL,
  `clasi_imc` varchar(50) NOT NULL,
  `clasi_peri` varchar(50) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_mensual`
--

INSERT INTO `registro_mensual` (`id`, `fecha`, `personal_id`, `pres_sis`, `pres_dia`, `pulso`, `valoracion`, `medico`, `peso`, `perimetro`, `imc`, `clasi_imc`, `clasi_peri`, `fecha_registro`, `estado`) VALUES
(4, '2020-04-28 21:39:15', 111, 152, 95, 123, 'HIPERTENSIÓN 1', 'Zerito', '8888888', '1', '2683518.90', 'SOBREPESO', 'BAJO', '2020-04-05', 1),
(5, '2020-04-28 21:55:53', 111, 158, 98, 1, 'HIPERTENSIÓN 1', 'Zerito', '1', '1', '0.30', 'SOBREPESO', 'BAJO', '2020-02-18', 1),
(6, '2020-04-28 22:28:19', 82, 125, 12, 123, 'PRE-HIPERTENSION', 'Zerito', '74', '123', '22.34', 'SOBREPESO', 'MUY ALTO', '2020-03-12', 0),
(7, '2020-04-28 22:49:05', 82, 123, 123, 123, 'PRE-HIPERTENSION', 'Zerito', '1123', '123', '339.03', 'SOBREPESO', 'MUY ALTOM', '2020-04-25', 0),
(8, '2020-05-01 00:47:25', 82, 180, 220, 122, 'CRISIS DE HIPERTENSIÓN', 'Elvis Bustamante', '72', '123', '21.74', ' SOBREPESO', 'MUY ALTO', '2020-05-25', 0),
(9, '2020-05-01 00:47:42', 82, 123, 4, 123, 'PRE-HIPERTENSIÓN', 'Elvis Bustamante', '123', '123', '37.13', 'SOBREPESO', 'MUY ALTO', '2020-06-26', 0),
(10, '2020-05-01 00:48:27', 82, 234, 234, 234, 'CRISIS DE HIPERTENSIÓN', 'Elvis Bustamante', '234', '34', '70.64', 'NORMAL', 'BAJO', '2020-07-14', 0),
(11, '2020-05-01 01:45:13', 82, 2555, 250, 123, 'CRISIS DE HIPERTENSIÓN', 'Elvis Bustamante', '74', '123', '22.34', 'NORMAL', 'MUY ALTO', '2020-01-04', 0),
(12, '2020-05-02 23:33:14', 82, 70, 40, 123, 'NORMAL', 'Elvis Bustamante', '500', '5555', '150.95', 'OBESIDAD', 'MUY ALTO', '2020-01-18', 1),
(13, '2020-04-28 21:39:15', 82, 152, 95, 123, 'HIPERTENSIÓN 1', 'Zerito', '8888888', '1', '2683518.90', 'NORMAL', 'BAJO', '2020-01-05', 0),
(14, '2020-04-28 22:49:05', 82, 123, 123, 123, 'PRE-HIPERTENSION', 'Zerito', '1123', '123', '339.03', 'DELGADEZ', 'MUY ALTOM', '2020-04-25', 0),
(15, '2020-12-28 22:49:05', 82, 123, 123, 123, 'PRE-HIPERTENSION', 'Zerito', '1123', '123', '339.03', 'SOBREPESO', 'MUY ALTOM', '2020-12-25', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_sanitario`
--

CREATE TABLE `registro_sanitario` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `alergias` varchar(124) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_sanitario`
--

INSERT INTO `registro_sanitario` (`id`, `personal_id`, `fecha`, `alergias`, `estado`) VALUES
(67, 111, '2020-04-28 16:15:27', 'xxxxxxx', 1),
(68, 82, '2020-04-28 16:19:49', 'NO', 0),
(69, 82, '2020-04-28 19:17:34', 'NO', 0),
(70, 82, '2020-04-28 21:00:42', 'NO', 0),
(71, 82, '2020-04-28 21:46:13', 'asdsdasdasd', 0),
(72, 82, '2020-04-28 21:55:29', 'asdasd', 0),
(73, 82, '2020-04-28 22:23:09', 'asdasd', 0),
(74, 82, '2020-04-28 22:23:45', 'dddddddddddd', 0),
(75, 82, '2020-04-28 22:25:27', 'asdasdsa', 0),
(76, 82, '2020-05-02 23:27:21', 'NO', 0),
(77, 82, '2020-05-05 18:52:33', 'ÑÑÑÑÑ', 1);

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
(2, 'adminpersomil', NULL),
(3, 'adminpersociv', NULL),
(4, 'adminpersoofi', NULL),
(5, 'adminmedicina', NULL),
(6, 'adminvehicular', NULL),
(7, 'adminintel', NULL),
(8, 'usuarios', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `dni_usu` int(8) NOT NULL,
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

INSERT INTO `usuarios` (`id_usu`, `dni_usu`, `nombres_usu`, `apellidos_usu`, `telefono`, `email`, `username`, `password`, `id_rol`, `estado_usu`) VALUES
(1, 12345678, 'Elvis Bustamante', 'Apaza', '958560996', 'victor.galvez56@gmail.com', 'administrador', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1),
(17, 77127600, 'Usuario', 'galvez', '958560996', 'victor.galvez@gmail.com', 'usuario', '9dbf7c1488382487931d10235fc84a74bff5d2f4', 8, 1);

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
(7, '12', '12', 'UYG', 'UY', 'GUYGUYG', 'UYG', 'UYG', 'UYG', 'UGY', 'GUYG', 'AREQUIPA', 82, 1),
(8, 'asdasd', 'asdasd', 'asdasd', 'asda', 'asd', 'asda', 'sdasd', 'asd', 'asdasd', 'asdasd', 'AREQUIPA', 82, 1),
(9, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asdasdasd', 'AREQUIPA', 82, 1),
(10, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'AREQUIPA', 84, 1),
(11, 'X1', 'X2', 'X3', 'X4', 'BLANCO', 'X5', 'X6', 'X7', 'X8', 'X9', 'AREQUIPA', 84, 1),
(12, 'xx', 'xxxx', 'XXXX', 'XXXX', 'XXXX', 'XXXX', 'MODELOXXX', 'PLACA VIGENTE', 'PLACA ANTERIOR', 'XXXX', 'AREQUIPA', 111, 1),
(18, 'PLACAXXX', 'XXXSERIE', 'VINXXX', 'MOTO', 'XXXXCOLOR', 'MARCA', 'MODELO', 'PLACA VIGENTE', 'PLACA ANTERIOR', 'ANOTACIONES', 'AREQUIPA', 111, 1);

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `detalle_estudios`
--
ALTER TABLE `detalle_estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `detalle_familiar`
--
ALTER TABLE `detalle_familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `detalle_idioma`
--
ALTER TABLE `detalle_idioma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `detalle_seguro`
--
ALTER TABLE `detalle_seguro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `detalle_viajes`
--
ALTER TABLE `detalle_viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id_men` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `registro_anual`
--
ALTER TABLE `registro_anual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `registro_mensual`
--
ALTER TABLE `registro_mensual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `registro_sanitario`
--
ALTER TABLE `registro_sanitario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
