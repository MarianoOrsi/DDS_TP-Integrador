-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2015 a las 03:04:15
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diseniosistemas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RegistrarUsuario`(
    IN usuario_param VARCHAR(50),
    IN pass_param VARCHAR(25),
    IN sexo_param VARCHAR(1),
    IN dieta VARCHAR(50),
    IN rutina VARCHAR(50),
    IN complexion VARCHAR(50),
    IN preexistentes VARCHAR(50),
    IN altura_param INT,
    IN edad_param INT,
    IN email_param VARCHAR(40)
    )
BEGIN

DECLARE idDieta_var int;
DECLARE idRutina_var int;
DECLARE idComplexion_var int;
DECLARE idPreexistentes_var int;

select IdDieta into idDieta_var from dietas where Nombre = dieta;
select IdRutina into idRutina_var from rutinas where Nombre = rutina;
select IdContextura into idComplexion_var from contexturas where Nombre = complexion;
select IdPreexistente into idPreexistentes_var from preexistentes where Nombre = preexistentes;

insert into usuarios
(Usuario,Contrase,fechaCreacion,IdContextura,Sexo,IdRutina,Edad,Altura,IdPreexistente,IdDieta,Email)
VALUES
(usuario_param,pass_param,NOW(),idComplexion_var,sexo_param,idRutina_var,edad_param,altura_param,idPreexistentes_var,idDieta_var,`email_param`);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VerPreferencias`(IN `IdUsu` INT)
    NO SQL
SELECT IdPreferencia, preferencias.IdIngrediente, IdUsuario, ingredientes.Ingrediente FROM preferencias inner join ingredientes on preferencias.IdIngrediente=ingredientes.IdIngrediente
where idusuario=IdUsu$$$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE IF NOT EXISTS `acciones` (
  `IdAccion` int(11) NOT NULL,
  `Accion` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`IdAccion`, `Accion`) VALUES
(1, 'Seleccion'),
(2, 'Calificacion'),
(3, 'Consulta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condimentos`
--

CREATE TABLE IF NOT EXISTS `condimentos` (
  `IdCondimento` int(11) NOT NULL,
  `Condimento` varchar(50) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `imagen` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `condimentos`
--

INSERT INTO `condimentos` (`IdCondimento`, `Condimento`, `Tipo`, `imagen`) VALUES
(1, 'ajiPicante', '', 'img\\Condimentos\\aji-puta-pario.jpg'),
(2, 'ajiRePicante', '', 'img\\Condimentos\\aji-rocoto.jpg'),
(3, 'albaca', '', 'img\\Condimentos\\albaca.jpg'),
(4, 'azafran', '', 'img\\Condimentos\\Azafran.jpg'),
(5, 'canela', '', 'img\\Condimentos\\Canela.jpg'),
(6, 'cilantro', '', 'img\\Condimentos\\cilantro.jpg'),
(7, 'clavo', '', 'img\\Condimentos\\clavos_de_olor.jpg'),
(8, 'comino', '', 'img\\Condimentos\\comino.jpg'),
(9, 'jengibre', '', 'img\\Condimentos\\jengibre.jpg'),
(10, 'laurel', '', 'img\\Condimentos\\laurel.jpg'),
(11, 'menta', '', 'img\\Condimentos\\menta.jpg'),
(12, 'nuezMoscada', '', 'img\\Condimentos\\nuez_moscada.jpg'),
(13, 'oregano', '', 'img\\Condimentos\\oregano.jpg'),
(14, 'perejil', '', 'img\\Condimentos\\perejil.jpg'),
(15, 'pimientaNegra', '', 'img\\Condimentos\\pimienta-negra.jpg'),
(16, 'pimientaRoja', '', 'img\\Condimentos\\pimienta-roja.jpg'),
(17, 'romero', '', 'romero.jpg'),
(18, 'sal', '', 'img\\Condimentos\\sal.jpg'),
(19, 'tomillo', '', 'img\\Condimentos\\Tomillo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contexturas`
--

CREATE TABLE IF NOT EXISTS `contexturas` (
  `IdContextura` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contexturas`
--

INSERT INTO `contexturas` (`IdContextura`, `Nombre`, `Descripcion`) VALUES
(1, 'Peque', 'Peque'),
(2, 'Mediana', 'Mediana'),
(3, 'Grande', 'Grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dietas`
--

CREATE TABLE IF NOT EXISTS `dietas` (
  `IdDieta` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dietas`
--

INSERT INTO `dietas` (`IdDieta`, `Nombre`) VALUES
(1, 'Normal'),
(2, 'Vegano'),
(3, 'Vegetariano'),
(4, 'Ovolactovegetariano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dificultades`
--

CREATE TABLE IF NOT EXISTS `dificultades` (
  `IdDificultad` int(11) NOT NULL,
  `Dificultad` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dificultades`
--

INSERT INTO `dificultades` (`IdDificultad`, `Dificultad`) VALUES
(1, 'Facil'),
(2, 'Media'),
(3, 'Dificil'),
(4, 'Muy Dificil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estaciones`
--

CREATE TABLE IF NOT EXISTS `estaciones` (
  `IdEstacion` int(11) NOT NULL,
  `Estacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estaciones`
--

INSERT INTO `estaciones` (`IdEstacion`, `Estacion`) VALUES
(1, 'Verano'),
(2, 'Oto'),
(3, 'Invierno'),
(4, 'Primavera'),
(5, 'Navidad'),
(6, 'Pascuas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `IdGrupo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `IdUsuarioCreador` int(11) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial-horarios`
--

CREATE TABLE IF NOT EXISTS `historial-horarios` (
  `IdRecetaHorario` int(11) NOT NULL,
  `IdHistorial` int(11) NOT NULL,
  `IdHorario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales`
--

CREATE TABLE IF NOT EXISTS `historiales` (
  `IdHistoria` int(11) NOT NULL,
  `IdAccion` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `Fecha de Accion` datetime NOT NULL,
  `Fecha de Utilizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `IdHorario` int(11) NOT NULL,
  `Horario` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`IdHorario`, `Horario`) VALUES
(1, 'Desayuno'),
(2, 'Almuerzo'),
(3, 'Merienda'),
(4, 'Cena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `IdIngrediente` int(11) NOT NULL,
  `Ingrediente` varchar(50) NOT NULL,
  `Porcion` int(11) NOT NULL,
  `Calorias` int(11) NOT NULL,
  `imagen` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`IdIngrediente`, `Ingrediente`, `Porcion`, `Calorias`, `imagen`) VALUES
(3, 'aceiteGirasol', 100, 154, 'img\\Ingredientes\\aceite-de-girasol.jpg'),
(4, 'aceiteOliva', 100, 152, 'img\\Ingredientes\\aceite-oliva.jpg'),
(5, 'aceituna', 1, 9, 'img\\Ingredientes\\aceituna.jpg'),
(6, 'ajo', 1, 5, 'img\\Ingredientes\\ajo.jpg'),
(7, 'arroz', 50, 68, 'img\\Ingredientes\\arroz.jpg'),
(8, 'asado', 100, 59, 'img\\Ingredientes\\asado.jpg'),
(9, 'banana', 1, 89, 'img\\Ingredientes\\banana.jpg'),
(10, 'batata', 1, 56, 'img\\Ingredientes\\batata.jpg'),
(11, 'cebolla', 1, 58, 'img\\Ingredientes\\cebolla.jpg'),
(12, 'cebollaVerdeo', 5, 57, 'img\\Ingredientes\\cebolla-de-verdeo.jpg'),
(13, 'esparrago', 5, 65, 'img\\Ingredientes\\esparragos.jpg'),
(14, 'espinaca', 12, 78, 'img\\Ingredientes\\espinaca.jpg'),
(15, 'fideos', 50, 32, 'img\\Ingredientes\\fideos.jpg'),
(16, 'harinaTrigo', 50, 35, 'img\\Ingredientes\\harina-de-trigo.jpg'),
(17, 'harinaMaiz', 50, 54, 'img\\Ingredientes\\harina-del-maiz.jpg'),
(18, 'hongo', 1, 12, 'img\\Ingredientes\\hongo.jpg'),
(19, 'huevo', 1, 36, 'img\\Ingredientes\\huevo.jpg'),
(20, 'kiwi', 1, 34, 'img\\Ingredientes\\kiwi.jpg'),
(21, 'leche', 50, 41, 'img\\Ingredientes\\leche.jpg'),
(22, 'limon', 1, 29, 'img\\Ingredientes\\limon.jpg'),
(23, 'lomo', 100, 92, 'img\\Ingredientes\\lomo.jpg'),
(24, 'mandarina', 1, 59, 'img\\Ingredientes\\mandarina.jpg'),
(25, 'manteca', 20, 89, 'img\\Ingredientes\\manteca.jpg'),
(26, 'manzana', 1, 59, 'img\\Ingredientes\\manzana.jpg'),
(27, 'matambre', 100, 89, 'img\\Ingredientes\\matambre.jpg'),
(28, 'melon', 1, 340, 'img\\Ingredientes\\melon.jpg'),
(29, 'morron', 10, 9, 'img\\Ingredientes\\morron-rojo.jpg'),
(30, 'naranja.jpg', 1, 59, 'img\\Ingredientes\\naranja.jpg'),
(31, 'papa', 1, 50, 'img\\Ingredientes\\papas.jpg'),
(32, 'pepino', 1, 59, 'img\\Ingredientes\\pepinos.jpg'),
(33, 'pera', 1, 59, 'img\\Ingredientes\\Pera.jpg'),
(34, 'pescado', 30, 26, 'img\\Ingredientes\\pescado.jpg'),
(35, 'pina', 1, 257, 'img\\Ingredientes\\pina.jpg'),
(36, 'queso', 60, 38, 'img\\Ingredientes\\queso.jpg'),
(37, 'repollo', 1, 674, 'img\\Ingredientes\\repollo_morado.jpg'),
(38, 'sandia', 1, 102, 'img\\Ingredientes\\sandia.jpg'),
(39, 'tomate', 1, 38, 'img\\Ingredientes\\tomate.jpg'),
(40, 'vacio', 100, 98, 'img\\Ingredientes\\vacio.jpg'),
(41, 'vinoBlanco', 1, 268, 'img\\Ingredientes\\vino-blanco.jpg'),
(42, 'vinoTinto', 1, 126, 'img\\Ingredientes\\vino-timto.jpg'),
(43, 'zanahoria', 1, 34, 'img\\Ingredientes\\zanahoria.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasos`
--

CREATE TABLE IF NOT EXISTS `pasos` (
  `IdPasos` int(11) NOT NULL,
  `Paso` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pesos-ideales`
--

CREATE TABLE IF NOT EXISTS `pesos-ideales` (
  `IdPesos-Ideales` int(11) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Altura` int(11) NOT NULL,
  `MedidaTorax` int(11) NOT NULL,
  `MedidaCintura` int(11) NOT NULL,
  `MedidaCadera` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `PesoMinimo` int(11) NOT NULL,
  `PesoMaximo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pesos-ideales`
--

INSERT INTO `pesos-ideales` (`IdPesos-Ideales`, `Sexo`, `Altura`, `MedidaTorax`, `MedidaCintura`, `MedidaCadera`, `Peso`, `PesoMinimo`, `PesoMaximo`) VALUES
(1, 'M', 183, 90, 75, 75, 80, 73, 88);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piramides`
--

CREATE TABLE IF NOT EXISTS `piramides` (
  `IdPiramide` int(11) NOT NULL,
  `Sector` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Contraindicaciones` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preexistentes`
--

CREATE TABLE IF NOT EXISTS `preexistentes` (
  `IdPreexistente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preexistentes`
--

INSERT INTO `preexistentes` (`IdPreexistente`, `Nombre`) VALUES
(1, 'Diabetes'),
(2, 'Hipertension'),
(3, 'Celiasis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencias`
--

CREATE TABLE IF NOT EXISTS `preferencias` (
  `IdPreferencia` int(11) NOT NULL,
  `IdIngrediente` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preferencias`
--

INSERT INTO `preferencias` (`IdPreferencia`, `IdIngrediente`, `IdUsuario`, `Fecha`) VALUES
(1, 4, 29, '2015-09-16 00:00:00'),
(2, 7, 29, '2015-10-01 00:00:00'),
(3, 14, 29, '2015-10-06 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE IF NOT EXISTS `procedimiento` (
  `IdProcedimiento` int(11) NOT NULL,
  `IdPaso` int(11) NOT NULL,
  `Paso` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE IF NOT EXISTS `puntuaciones` (
  `IdPuntuacion` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-estaciones`
--

CREATE TABLE IF NOT EXISTS `receta-estaciones` (
  `IdRecetaEstacion` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `IdEstacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-ingredientes`
--

CREATE TABLE IF NOT EXISTS `receta-ingredientes` (
  `IdRecetaIngrediente` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `IdIngrediente` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL COMMENT '0 Ing. Principal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE IF NOT EXISTS `recetas` (
  `IdReceta` int(11) NOT NULL,
  `Receta` varchar(50) NOT NULL,
  `IdDificultad` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdPiramide` int(11) NOT NULL,
  `IdDieta` int(11) NOT NULL,
  `Calorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE IF NOT EXISTS `rutinas` (
  `IdRutina` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rutinas`
--

INSERT INTO `rutinas` (`IdRutina`, `Nombre`, `Descripcion`) VALUES
(1, 'Nada', 'Sedentaria con nada de ejercicio'),
(2, 'Leve', 'Sedentaria con algo de ejercicio (-30 min.)'),
(3, 'Mediano', 'Sedentaria con ejercicio (+30 min.)'),
(4, 'Fuerte', 'Activa sin ejercicio adicional'),
(5, 'Intensivo', 'Activa con ejercicio adicional (+30 min.)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario-grupos`
--

CREATE TABLE IF NOT EXISTS `usuario-grupos` (
  `IdUsuarioGrupo` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdGrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Contrase` varchar(25) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `IdContextura` int(11) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Trabajo` varchar(50) DEFAULT NULL,
  `IdRutina` int(11) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Altura` int(11) NOT NULL,
  `IdPreexistente` int(11) NOT NULL,
  `IdDieta` int(11) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `IdPesos-Ideales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Usuario`, `Contrase`, `fechaCreacion`, `IdContextura`, `Sexo`, `Trabajo`, `IdRutina`, `Edad`, `Altura`, `IdPreexistente`, `IdDieta`, `Email`, `IdPesos-Ideales`) VALUES
(1, 'Leandrin', 'pepe', '0000-00-00 00:00:00', 3, 'm', NULL, 3, 0, 123, 1, 2, 'pepin', 1),
(3, 'd', 'pepe', '2015-08-23 16:42:59', 3, 'm', NULL, 3, 0, 123, 1, 3, 'pepin', 1),
(4, '425', 'twr', '2015-08-23 17:02:37', 1, 'm', NULL, 3, 0, 0, 3, 4, '24524', 1),
(5, 'fd', 'fda', '2015-08-23 17:05:43', 2, 'f', NULL, 3, 0, 452, 3, 4, 'fafd', 1),
(6, 'fdafad', 'fdafa', '2015-08-23 17:10:53', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
(8, 'fdafadd', 'fdafa', '2015-08-23 17:11:37', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
(9, 'fdafaddd', 'fdafa', '2015-08-23 17:12:15', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
(10, 'fdafadddg', 'fdafa', '2015-08-23 17:12:28', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
(11, 'frgsfg', 'gsfgf', '2015-08-23 17:20:23', 1, 'f', NULL, 1, 0, 34, 3, 4, 'sfgsf', 1),
(12, 'frgsfgh', 'gsfgf', '2015-08-23 17:20:45', 1, 'f', NULL, 1, 0, 34, 3, 4, 'sfgsf', 1),
(13, 'the', 'hethe', '2015-08-23 17:21:54', 2, 'm', NULL, 2, 0, 2142, 3, 4, 'hethe', 1),
(15, '4254', '24524', '2015-08-23 17:26:56', 1, 'm', NULL, 1, 0, 2452, 3, 4, '452452', 1),
(16, '789', '789', '2015-08-23 17:28:16', 1, 'm', NULL, 3, 0, 789, 3, 4, '7789', 1),
(17, '46', '4', '2015-08-23 17:30:14', 2, 'm', NULL, 2, 0, 34, 3, 4, '4', 1),
(18, '423', '23', '2015-08-23 17:32:18', 1, 'm', NULL, 2, 0, 234, 3, 4, '234', 1),
(19, 'er', 're', '2015-08-23 17:34:25', 2, 'm', NULL, 2, 0, 4, 3, 4, 're', 1),
(20, 'feeqeq', 'fe', '2015-08-23 17:36:23', 1, 'm', NULL, 2, 0, 3, 3, 4, 'qeqeq', 1),
(21, '2', '23', '2015-08-23 17:39:52', 1, 'm', NULL, 2, 0, 3, 3, 4, '234', 1),
(22, '25', '23', '2015-08-23 17:40:47', 1, 'm', NULL, 2, 0, 3, 3, 4, '234', 1),
(23, 'g', 'g', '2015-08-23 17:42:38', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
(25, 'gt', 'gttt', '2015-08-23 17:45:01', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
(26, 'gt2', 'gttt', '2015-08-23 17:46:01', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
(27, 'gt3', 'gttt', '2015-08-23 17:46:29', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
(28, 'gt4', 'qe', '2015-08-23 17:47:39', 1, 'f', NULL, 3, 0, 1, 3, 4, 'qe', 1),
(29, 'Maxi', 'pepe', '2015-08-23 17:49:27', 2, 'm', NULL, 3, 20, 100, 2, 1, 'maxi-cantarell@hotmail.com', 1),
(30, 'fdfdafdafdfa', 'fadfad', '2015-08-23 17:56:42', 1, 'm', NULL, 2, 234, 5245, 3, 4, 'fadfadfa', 1),
(31, '45245245', '45', '2015-08-23 18:05:48', 1, 'm', NULL, 2, 5454, 545, 3, 4, '454', 1),
(32, '425245', '5245', '2015-08-23 18:11:13', 2, 'm', NULL, 2, 42524, 42524, 3, 4, '42524', 1),
(33, 'LeanBiker', 'pepe', '2015-08-23 18:28:28', 1, 'm', NULL, 1, 21, 23, 3, 4, 'easa', 1),
(34, '646', '6464', '2015-08-23 18:38:28', 1, 'm', NULL, 2, 446, 464, 3, 4, '4646', 1),
(35, 'gdfa', 'fad', '2015-08-23 18:51:10', 1, 'm', NULL, 1, 234, 245, 3, 4, 'fad', 1),
(36, 'lucas', '7410', '2015-08-24 22:20:29', 2, 'm', NULL, 2, 15, 174, 1, 3, 'luks_manga@hotmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`IdAccion`);

--
-- Indices de la tabla `condimentos`
--
ALTER TABLE `condimentos`
  ADD PRIMARY KEY (`IdCondimento`);

--
-- Indices de la tabla `contexturas`
--
ALTER TABLE `contexturas`
  ADD PRIMARY KEY (`IdContextura`);

--
-- Indices de la tabla `dietas`
--
ALTER TABLE `dietas`
  ADD PRIMARY KEY (`IdDieta`);

--
-- Indices de la tabla `dificultades`
--
ALTER TABLE `dificultades`
  ADD PRIMARY KEY (`IdDificultad`);

--
-- Indices de la tabla `estaciones`
--
ALTER TABLE `estaciones`
  ADD PRIMARY KEY (`IdEstacion`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`IdGrupo`),
  ADD UNIQUE KEY `Grupo` (`Nombre`),
  ADD KEY `IdUsuarioCreador` (`IdUsuarioCreador`);

--
-- Indices de la tabla `historial-horarios`
--
ALTER TABLE `historial-horarios`
  ADD PRIMARY KEY (`IdRecetaHorario`),
  ADD KEY `IdHistorial` (`IdHistorial`),
  ADD KEY `IdHorario` (`IdHorario`);

--
-- Indices de la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD PRIMARY KEY (`IdHistoria`),
  ADD KEY `IdAccion` (`IdAccion`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdReceta` (`IdReceta`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`IdHorario`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`IdIngrediente`);

--
-- Indices de la tabla `pasos`
--
ALTER TABLE `pasos`
  ADD PRIMARY KEY (`IdPasos`);

--
-- Indices de la tabla `pesos-ideales`
--
ALTER TABLE `pesos-ideales`
  ADD PRIMARY KEY (`IdPesos-Ideales`);

--
-- Indices de la tabla `piramides`
--
ALTER TABLE `piramides`
  ADD PRIMARY KEY (`IdPiramide`);

--
-- Indices de la tabla `preexistentes`
--
ALTER TABLE `preexistentes`
  ADD PRIMARY KEY (`IdPreexistente`);

--
-- Indices de la tabla `preferencias`
--
ALTER TABLE `preferencias`
  ADD PRIMARY KEY (`IdPreferencia`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdIngrediente` (`IdIngrediente`);

--
-- Indices de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`IdProcedimiento`),
  ADD KEY `IdReceta` (`IdReceta`),
  ADD KEY `IdPaso` (`IdPaso`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`IdPuntuacion`),
  ADD KEY `IdReceta` (`IdReceta`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `receta-estaciones`
--
ALTER TABLE `receta-estaciones`
  ADD PRIMARY KEY (`IdRecetaEstacion`),
  ADD KEY `IdEstacion` (`IdEstacion`),
  ADD KEY `IdReceta` (`IdReceta`);

--
-- Indices de la tabla `receta-ingredientes`
--
ALTER TABLE `receta-ingredientes`
  ADD PRIMARY KEY (`IdRecetaIngrediente`),
  ADD KEY `IdReceta` (`IdReceta`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`IdReceta`),
  ADD KEY `IdDificultad` (`IdDificultad`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdPiramide` (`IdPiramide`),
  ADD KEY `IdDieta` (`IdDieta`);

--
-- Indices de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`IdRutina`);

--
-- Indices de la tabla `usuario-grupos`
--
ALTER TABLE `usuario-grupos`
  ADD PRIMARY KEY (`IdUsuarioGrupo`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdGrupo` (`IdGrupo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `Usuario` (`Usuario`),
  ADD KEY `IdContextura` (`IdContextura`),
  ADD KEY `IdRutina` (`IdRutina`),
  ADD KEY `IdDieta` (`IdDieta`),
  ADD KEY `IdPreexistente` (`IdPreexistente`),
  ADD KEY `IdPesos-Ideales` (`IdPesos-Ideales`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `IdAccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `condimentos`
--
ALTER TABLE `condimentos`
  MODIFY `IdCondimento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `contexturas`
--
ALTER TABLE `contexturas`
  MODIFY `IdContextura` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `dietas`
--
ALTER TABLE `dietas`
  MODIFY `IdDieta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `dificultades`
--
ALTER TABLE `dificultades`
  MODIFY `IdDificultad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pesos-ideales`
--
ALTER TABLE `pesos-ideales`
  MODIFY `IdPesos-Ideales` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `preferencias`
--
ALTER TABLE `preferencias`
  MODIFY `IdPreferencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `UsuarioCreador` FOREIGN KEY (`IdUsuarioCreador`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `historial-horarios`
--
ALTER TABLE `historial-horarios`
  ADD CONSTRAINT `Historial` FOREIGN KEY (`IdHistorial`) REFERENCES `historiales` (`IdHistoria`),
  ADD CONSTRAINT `Horarios` FOREIGN KEY (`IdHorario`) REFERENCES `horarios` (`IdHorario`);

--
-- Filtros para la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD CONSTRAINT `Historial-Accion` FOREIGN KEY (`IdAccion`) REFERENCES `acciones` (`IdAccion`),
  ADD CONSTRAINT `Historial-Receta` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`),
  ADD CONSTRAINT `Historial-Usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `preferencias`
--
ALTER TABLE `preferencias`
  ADD CONSTRAINT `Ingrediente` FOREIGN KEY (`IdIngrediente`) REFERENCES `ingredientes` (`IdIngrediente`),
  ADD CONSTRAINT `Preferencia-Usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD CONSTRAINT `Pasos` FOREIGN KEY (`IdPaso`) REFERENCES `pasos` (`IdPasos`),
  ADD CONSTRAINT `Recetas` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`);

--
-- Filtros para la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD CONSTRAINT `Puntuacion-Receta` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`),
  ADD CONSTRAINT `Puntuacion-Usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `receta-estaciones`
--
ALTER TABLE `receta-estaciones`
  ADD CONSTRAINT `Estaciones` FOREIGN KEY (`IdEstacion`) REFERENCES `estaciones` (`IdEstacion`),
  ADD CONSTRAINT `Receta-Estaciones2` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`);

--
-- Filtros para la tabla `receta-ingredientes`
--
ALTER TABLE `receta-ingredientes`
  ADD CONSTRAINT `Receta-Ingredientes` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `Receta-Dieta` FOREIGN KEY (`IdDieta`) REFERENCES `dietas` (`IdDieta`),
  ADD CONSTRAINT `Receta-Dificultad` FOREIGN KEY (`IdDificultad`) REFERENCES `dificultades` (`IdDificultad`),
  ADD CONSTRAINT `Receta-Piramide` FOREIGN KEY (`IdPiramide`) REFERENCES `piramides` (`IdPiramide`),
  ADD CONSTRAINT `Receta-Usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `usuario-grupos`
--
ALTER TABLE `usuario-grupos`
  ADD CONSTRAINT `Grupo` FOREIGN KEY (`IdGrupo`) REFERENCES `grupos` (`IdGrupo`),
  ADD CONSTRAINT `Grupo-Usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `Usuario-Contextura` FOREIGN KEY (`IdContextura`) REFERENCES `contexturas` (`IdContextura`),
  ADD CONSTRAINT `Usuario-Dieta` FOREIGN KEY (`IdDieta`) REFERENCES `dietas` (`IdDieta`),
  ADD CONSTRAINT `Usuario-Peso` FOREIGN KEY (`IdPesos-Ideales`) REFERENCES `pesos-ideales` (`IdPesos-Ideales`),
  ADD CONSTRAINT `Usuario-Preexistentes` FOREIGN KEY (`IdPreexistente`) REFERENCES `preexistentes` (`IdPreexistente`),
  ADD CONSTRAINT `Usuario-Rutina` FOREIGN KEY (`IdRutina`) REFERENCES `rutinas` (`IdRutina`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
